$(document).ready(function() {

    $("#btn-choose-name").click(function() {
        var name_input = $("#name-input-field").val()
        var table_input = $('#theComboBox option:selected').text()
        table_input = table_input.toLowerCase()

        // alert(table_input);
        // alert(name_input);

        
        if(table_input == "people"){
            // console.log("PEOPLE")
            $.ajax({
                url: `api/${table_input}/search`,
                type: 'POST',
                dataType: "json",
                data: { "namePeople": `${name_input}` },
                success: function(data) {
                    var list = ''
                    for (var key in data) {
                        for (var key1 in data[key]) {
                            list += '<tr>';
                            list += '<td>' + data[key][key1].idPeople + '</td>';
                            list += '<td>' + data[key][key1].namePeople + '</td>'
                            list += '<td>' + data[key][key1].passwordPeople + '</td>'
                            list += '</tr>';
                        }
                    }
                    $('#table-search').append(list);
                },
                error: function() {
                    alert("No callback")
                }
            });
        } else if (table_input == "creatures") {
            // console.log("CREATURES")
            
            $.ajax({
                url: `api/${table_input}/search`,
                type: 'POST',
                dataType: "json",
                data: { "nameCreature": `${name_input}` },
                success: function(data) {
                    var list = ''
                    for (var key in data) {
                        for (var key1 in data[key]) {
                            list += '<tr>';
                            list += '<td>' + data[key][key1].idCreature + '</td>';
                            list += '<td>' + data[key][key1].nameCreature + '</td>'
                            list += '<td>' + data[key][key1].passwordCreature + '</td>'
                            list += '</tr>';
                        }
                    }
                    $('#table-search').append(list);
                },
                error: function() {
                    alert("No Callback")
                }
            });
        }
    });


});