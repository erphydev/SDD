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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('M_Dashboard')->default(false); // New test requests -  rejected tests - approved tests = pending tests
            //Users
            $table->boolean('User_List')->default(false); // see users lists + tests filters - status filter
            $table->boolean('Add_User')->default(false);
            //Roles
            $table->boolean('Role_Controller')->default(false); //See Roles
            $table->boolean('Role_View')->default(false);
            //admins
            $table->boolean('Add_Admin')->default(false);
            //coachs
            $table->boolean('Coachs_List')->default(false);
            $table->boolean('Add_Coachs')->default(false);
            //payments
            $table->boolean('All_Payments_List')->default(false);
            $table->boolean('Add_Payment')->default(false);
            $table->boolean('Payment_List')->default(false);
            $table->boolean('Add_Cheacks')->default(false);
            $table->boolean('Cheacks_List')->default(false);
            $table->boolean('Financial_History')->default(false); // see users all financial history
            //Calenders
            $table->boolean('Calendars')->default(false); // SEE Calendars
            $table->boolean('Add_Calendar')->default(false);
            //User Edit
            $table->boolean('Edit_Profile')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
