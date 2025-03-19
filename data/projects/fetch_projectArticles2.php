<?php

/*
 * Example PHP implementation used for the index.html example
 */

// DataTables PHP library
include( "../DataTablesEditor/lib/DataTables.php" );

// Alias Editor classes so they are easy to use
use
	DataTables\Editor,
	DataTables\Editor\Field,
	DataTables\Editor\Format,
	DataTables\Editor\Mjoin,
	DataTables\Editor\Options,
	DataTables\Editor\Upload,
	DataTables\Editor\Validate,
	DataTables\Editor\ValidateOptions;

// Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'tb_projects_positions' )
	->fields(
        Field::inst( 'tb_projects_positions.projectID' ),
		Field::inst( 'tb_projects_positions.articleID' )
            ->options( Options::inst()
                ->table( 'tb_article' )
                ->value( 'articleID' )
                ->label( 'name' )
        ),
        Field::inst( 'tb_projects_positions.articleDescription'),
		Field::inst( 'tb_projects_positions.articleAmount' ),
		Field::inst( 'tb_projects_positions.date' ),
		Field::inst( 'tb_projects_positions.articleName' )
	)
    ->leftJoin('tb_article', 'tb_article.articleID', '=', 'tb_projects_positions.articleID')
    ->where('tb_projects_positions.projectID',$_GET['projectID'])
	->debug(true)
	->process( $_POST )
	->json();
