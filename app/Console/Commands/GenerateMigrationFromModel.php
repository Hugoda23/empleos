<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class GenerateMigrationFromModel extends Command
{
    protected $signature = 'make:migration-from-model {model}';
    protected $description = 'Genera una migración básica desde el modelo y su $fillable';

    public function handle()
    {
        $modelName = $this->argument('model');
        $modelClass = "\\App\\Models\\$modelName";

        if (!class_exists($modelClass)) {
            $this->error("El modelo $modelClass no existe.");
            return Command::FAILURE;
        }

        $model = new $modelClass;
        $table = $model->getTable();
        $fillable = $model->getFillable();

        $migrationName = 'create_' . $table . '_table';
        $filename = date('Y_m_d_His') . '_' . $migrationName . '.php';
        $path = database_path("migrations/{$filename}");

        $stub = $this->generateMigrationStub($table, $fillable);

        file_put_contents($path, $stub);
        $this->info("Migración generada: $path");

        return Command::SUCCESS;
    }

    protected function generateMigrationStub($table, $fillable)
    {
        $fields = '';
        foreach ($fillable as $column) {
            $fields .= "            \$table->string('$column')->nullable();\n";
        }

        return <<<EOT
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('$table', function (Blueprint \$table) {
            \$table->id();
$fields            \$table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('$table');
    }
};
EOT;
    }
}
