<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('contents', function (Blueprint $t) {
            $t->id(); $t->string('key')->unique(); $t->longText('value')->nullable(); $t->timestamps();
        });
        Schema::create('posts', function (Blueprint $t) {
            $t->id(); $t->string('title'); $t->string('slug')->unique(); $t->string('author')->nullable();
            $t->date('published_at')->nullable(); $t->string('image')->nullable(); $t->text('excerpt')->nullable();
            $t->longText('body')->nullable(); $t->boolean('is_featured')->default(false); $t->timestamps();
        });
        Schema::create('openings', function (Blueprint $t) {
            $t->id(); $t->string('title'); $t->string('slug')->unique(); $t->string('experience')->nullable();
            $t->string('work_mode')->default('In House'); $t->string('job_type')->default('Full Time');
            $t->string('salary')->default('Negotiable'); $t->string('location')->default('Mohakhali');
            $t->date('posted_on')->nullable(); $t->date('apply_before')->nullable();
            $t->text('description')->nullable(); $t->text('responsibilities')->nullable(); $t->text('requirements')->nullable();
            $t->boolean('is_open')->default(true); $t->timestamps();
        });
        Schema::create('members', function (Blueprint $t) {
            $t->id(); $t->string('name'); $t->string('role')->nullable(); $t->string('photo')->nullable();
            $t->integer('sort')->nullable()->default(0); $t->timestamps();
        });
        Schema::create('clients', function (Blueprint $t) {
            $t->id(); $t->string('name'); $t->string('logo')->nullable(); $t->integer('sort')->nullable()->default(0); $t->timestamps();
        });
        Schema::create('projects', function (Blueprint $t) {
            $t->id(); $t->string('title'); $t->string('category')->nullable(); $t->string('image')->nullable();
            $t->string('link')->nullable(); $t->integer('sort')->nullable()->default(0); $t->timestamps();
        });
        Schema::create('testimonials', function (Blueprint $t) {
            $t->id(); $t->text('quote'); $t->string('name'); $t->string('position')->nullable(); $t->string('photo')->nullable(); $t->timestamps();
        });
        Schema::create('messages', function (Blueprint $t) {
            $t->id(); $t->string('first_name'); $t->string('last_name')->nullable(); $t->string('email');
            $t->string('phone')->nullable(); $t->string('subject')->nullable(); $t->text('message'); $t->timestamps();
        });
        Schema::create('applications', function (Blueprint $t) {
            $t->id(); $t->foreignId('opening_id')->nullable(); $t->string('first_name'); $t->string('last_name')->nullable();
            $t->string('email'); $t->text('message')->nullable(); $t->string('resume')->nullable(); $t->timestamps();
        });
        Schema::create('subscribers', function (Blueprint $t) {
            $t->id(); $t->string('email')->unique(); $t->timestamps();
        });
    }

    public function down()
    {
        foreach (['subscribers','applications','messages','testimonials','projects','clients','members','openings','posts','contents'] as $tbl) {
            Schema::dropIfExists($tbl);
        }
    }
};
