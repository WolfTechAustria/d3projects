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
Editor::inst( $db, 'tb_hours' )
	->fields(
        Field::inst( 'tb_hours.projectID' ),
		Field::inst( 'tb_hours.date' ),
        Field::inst( 'tb_hours.employeeID')
            ->options( Options::inst()
                ->table( 'tb_employees' )
                ->value( 'employeeID' )
                ->label( 'name' )
        ),
		Field::inst( 'tb_employees.name' ),
		Field::inst( 'tb_hours.start' ),
		Field::inst( 'tb_hours.end' ),
		Field::inst( 'tb_hours.description' )
	)
    ->leftJoin('tb_employees', 'tb_employees.employeeID', '=', 'tb_hours.employeeID')
    ->where('tb_hours.projectID',$_GET['projectID'])
	->debug(true)
	->process( $_POST )
	->json();
