function tableToExcel(){
var table2excel = new Table2Excel();
table2excel.export(document.querySelectorAll('table.table'));
}
 function select_all() {
    var checkboxes = document.getElementsByClassName('selected');
    for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
    }
};
$(function() {
    $('#example').DataTable({
        "bLengthChange":false,
        "pageLength":5,
        "language":{
            "emptyTable":"Aucun élément trouvé",
            "info":"",
            "infoEmpty":"Aucune donnée disponible",
            "loadingRecords":"chargement...",
            "processing": "En cours...",
            "search": "",
            "zeroRecord":"l'élément recherché n'existe pas",
            "paginate":{
                "first":"<<",
                "last":">>",
                "next":"suivant",
                "previous":"précédent",
                "placeholder":"rechercher"
            }

        }

    });

    } );
