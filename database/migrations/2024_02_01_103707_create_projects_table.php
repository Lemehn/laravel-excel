<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   /**
    * Run the migrations.
    */
   public function up(): void
   {
      Schema::create('projects', function (Blueprint $table) {
         $table->id();
         $table->foreignId('type_id')->index()->constrained('types'); //Тип
         $table->string('title'); //Наименование
         $table->date('created_at_time'); //Дата создания
         $table->date('contracted_at'); //Сдача в срок
         $table->date('deadline')->nullable(); //Дедлайн
         $table->boolean('is_chain')->nullable(); //Сетевик
         $table->boolean('is_on_time')->nullable(); //Подписание договора
         $table->boolean('has_outsource')->nullable(); //Наличие аутсорсинга
         $table->boolean('has_investors')->nullable(); //Наличие инвесторов
         $table->integer('worker_count')->nullable(); //Количество участников
         $table->integer('service_count')->nullable(); //Количество услуг
         $table->integer('payment_first_step')->nullable(); //Вложение в первый этап
         $table->integer('payment_second_step')->nullable(); //Вложение во второй этап	
         $table->integer('payment_third_step')->nullable(); //Вложение в третий этап
         $table->integer('payment_forth_step')->nullable(); //Вложение в четвертый этап
         $table->text('comment')->nullable(); //Комментарий
         $table->decimal('effective_value', 13, 2)->nullable(); //Значение эффективности
         $table->timestamps();
      });
   }

   /**
    * Reverse the migrations.
    */
   public function down(): void
   {
      Schema::dropIfExists('projects');
   }
};
