<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        /* =====================================
         * 1. PERBAIKAN TABLE USERS
         * ===================================== */
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'phone')) {
                $table->string('phone')->unique()->after('id');
            }
        });

        /* =====================================
         * 2. FIX TABLE TRANSACTIONS
         * ===================================== */
        Schema::table('transactions', function (Blueprint $table) {

            // Hapus kolom lama
            if (Schema::hasColumn('transactions', 'transaction_code')) {
                $table->dropColumn('transaction_code');
            }

            // Tambah order_id (TANPA UNIQUE dulu)
            if (!Schema::hasColumn('transactions', 'order_id')) {
                $table->string('order_id')->nullable()->after('id');
            }

            // Tambah kolom lain jika belum ada
            if (!Schema::hasColumn('transactions', 'payment_method')) {
                $table->string('payment_method')->default('midtrans');
            }

            if (!Schema::hasColumn('transactions', 'payment_status')) {
                $table->string('payment_status')->default('pending');
            }

            if (!Schema::hasColumn('transactions', 'schedule_pickup')) {
                $table->dateTime('schedule_pickup')->nullable();
            }

            if (!Schema::hasColumn('transactions', 'status')) {
                $table->string('status')->default('pending');
            }
        });

        /* =====================================
         * 2B. GENERATE ORDER_ID UNTUK DATA LAMA
         * ===================================== */
        $transactions = DB::table('transactions')->get();

        foreach ($transactions as $trx) {
            $newOrderId = 'ORDER-' . str_pad($trx->id, 6, '0', STR_PAD_LEFT);

            DB::table('transactions')
                ->where('id', $trx->id)
                ->update(['order_id' => $newOrderId]);
        }

        /* =====================================
         * 2C. BARU TAMBAH UNIQUE CONSTRAINT
         * ===================================== */
        Schema::table('transactions', function (Blueprint $table) {
            $table->unique('order_id');
        });

        /* =====================================
         * 4. TABLE MIDTRANS LOGS (BARU)
         * ===================================== */
        if (!Schema::hasTable('midtrans_logs')) {
            Schema::create('midtrans_logs', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('transaction_id');
                $table->json('full_response');
                $table->timestamps();

                $table->foreign('transaction_id')
                    ->references('id')->on('transactions')
                    ->onDelete('cascade');
            });
        }
    }

    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            if (Schema::hasColumn('transactions', 'order_id')) {
                $table->dropUnique(['order_id']);
                $table->dropColumn('order_id');
            }
        });

        Schema::dropIfExists('midtrans_logs');
    }
};
