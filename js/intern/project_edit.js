$(document).ready(function() {


    var projectID = $('#ip_projectID').val();
    var permission = $('#permission').text();

    var editor = new DataTable.Editor({
        ajax: '../../data/projects/fetch_hours2.php?projectID='+ projectID +'',
        fields: [
            {
                label: 'Projektnummer:',
                def: projectID,
                name: 'tb_hours.projectID',
                type: 'readonly'
            },
            {
                label: 'Mitarbeiter:',
                name: 'tb_hours.employeeID',
                type: 'select'
            },
            {
                label: 'Datum:',
                name: 'tb_hours.date',
                type: 'datetime'
            },
            {
                label: 'Beginn:',
                name: 'tb_hours.start',
                type: 'datetime',
                format: 'HH:mm'
            },
            {
                label: 'Ende:',
                name: 'tb_hours.end',
                type: 'datetime',
                format: 'HH:mm'
            },
            {
                label: 'Arbeitsbeschreibung:',
                name: 'tb_hours.description'
            }
        ],
        table: '#hoursTable'
    });

        var table = $('#hoursTable').DataTable({
            ajax : {
                url: '../../data/projects/fetch_hours2.php?projectID='+ projectID +'',
                type: 'POST'
            },
            columns: [
                { data: 'tb_hours.date', render: DataTable.render.datetime('DD.MM.yyyy') },
                { data: 'tb_employees.name'},
                { 
                    data: null,
                    render: function (data, type, row){
                        start = row.tb_hours.start;
                        var startArray = start.split(":");
                        var startSeconds = (parseInt(startArray[0], 10) *60 * 60) + (parseInt(startArray[1], 10) * 60) + parseInt(startArray[2], 10);

                        end = row.tb_hours.end;
                        var endArray = end.split(":");
                        var endSeconds = (parseInt(endArray[0], 10) *60 * 60) + (parseInt(endArray[1], 10) * 60) + parseInt(endArray[2], 10);


                        var hours = (endSeconds - startSeconds) / 60 / 60;
                        return hours;
                    }
                },
                { data: 'tb_hours.start'},
                { data: 'tb_hours.end'},
                { data: 'tb_hours.description'}
            ],
            layout: {
                topStart: {
                    
                    buttons: [
                        { 
                            text: 'Stunden anlegen',
                            extend: 'create', 
                            editor: editor
                        },
                        { 
                            text: 'Stunden bearbeiten',
                            extend: 'edit',
                            editor: editor,
                            enabled: false
                        },
                        { 
                            text: 'Stunden löschen',
                            extend: 'remove', 
                            editor: editor,
                            enabled: false
                        }
                        
                    ]
                    
                }
            },
            responsive: true,
            select: 'single'
        });


        table.on('select deselect', function(){
            var selectedRows = table.rows({selected: true}).count();
            if(permission!=1){
            
            
            table.button(1).enable(selectedRows > 1);
            table.button(2).enable(selectedRows > 1);
            }
        });

        var editorArticle = new DataTable.Editor({
            ajax: '../../data/projects/fetch_projectArticles2.php?projectID='+ projectID +'',
            fields: [
                {
                    label: 'Projektnummer:',
                    def: projectID,
                    name: 'tb_projects_positions.projectID',
                    type: 'readonly'
                },
                {
                    label: 'Datum:',
                    name: 'tb_projects_positions.date',
                    type: 'datetime'
                },
                {
                    label: 'Artikel:',
                    name: 'tb_projects_positions.articleID',
                    type: 'select'
                },
                {
                    label: 'Artikelname',
                    name: 'tb_projects_positions.articleName',
                    type: 'hidden',
                },
                {
                    label: 'Anzahl:',
                    name: 'tb_projects_positions.articleAmount',
                    type: 'text'
                },
                {
                    label: 'Bemerkung:',
                    name: 'tb_projects_positions.articleDescription',
                    type: 'text'
                }
            ],
            table: '#articlesTable'
        });

        editorArticle.dependent(
            'tb_projects_positions.articleID',
            function(val, data, callback){
                editorArticle.field( 'tb_projects_positions.articleName').set(editorArticle.field('tb_projects_positions.articleID').input().children(':selected').text());
                return {};
            });

    

        var tableProjectArticles = $('#articlesTable').DataTable({
            ajax : {
                url: '../../data/projects/fetch_projectArticles2.php?projectID='+ projectID +'',
                type: 'POST'
            },
            columns: [
                { data: 'tb_projects_positions.date', render: DataTable.render.datetime('DD.MM.yyyy') },
                { data: 'tb_projects_positions.articleAmount'},
                { data: 'tb_projects_positions.articleName'},
                { data: 'tb_projects_positions.articleDescription'}
            ],
            layout: {
                topStart: {
                    
                    buttons: [
                        { 
                            text: 'Artikel anlegen',
                            extend: 'create', 
                            editor: editorArticle
                        },
                        { 
                            text: 'Eintrag bearbeiten',
                            extend: 'edit',
                            editor: editorArticle,
                            enabled: false
                        },
                        { 
                            text: 'Eintrag löschen',
                            extend: 'remove', 
                            editor: editorArticle,
                            enabled: false
                        }
                        
                    ]
                    
                }
            },
            responsive: true,
            select: 'single'

        });

        tableProjectArticles.on('select deselect', function(){
            var selectedRows = tableProjectArticles.rows({selected: true}).count();
            if(permission!=1){
            
            
            tableProjectArticles.button(1).enable(selectedRows > 1);
            tableProjectArticles.button(2).enable(selectedRows > 1);
            }
        });


    $('#btn_CreateOffer').click(function(){
        window.open('/offer/create/?projectID='+projectID+'', '_self');
    });
    $('#btn_CreateDeliverynote').click(function(){
        window.open('/deliverynote/create/?projectID='+projectID+'', '_self');
    });
    $('#btn_CreatePartitialInvoice').click(function(){
        window.open('/invoice/create/?projectID='+projectID+'&type=partitial', '_self');
    });
    $('#btn_CreateFinalInvoice').click(function(){
        window.open('/invoice/create/?projectID='+projectID+'&type=final', '_self');
    });

      

});
