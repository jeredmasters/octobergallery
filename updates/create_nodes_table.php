<?php namespace JeredMasters\Gallery\Updates; 

use Schema;
use October\Rain\Database\Updates\Migration;
use JeredMasters\Gallery\Models\Image;

class CreateNodesTable extends Migration
{

    public function up()
    {
        Schema::create('jeredmasters_gallery_nodes', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title', 255)->nullable();
            $table->string('node_type',255);
            $table->integer('parent')->nullable();
            $table->string('slug',255);
            $table->text('description')->nullable();
            $table->text('data')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });

	$image = new Image;
	$image->title = "test";
        $image->save();

	$image2 = Image::find($image->id);
	$image2->data = "asdf";
        $image2->save();
    }

    public function down()
    {
        Schema::dropIfExists('jeredmasters_gallery_nodes');
    }

}
