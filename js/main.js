$(document).ready(function () {

    $('#pretraziProdaje').keyup(searchProdaje);
    $('#pretraziKlijente').keyup(searchKlijente);

});




function searchProdaje() {
    let value = $(this).val();
    console.log(value);


    $.ajax({
        url: "index.php?page=searchProdaje&valueSearch=" + value,
        method: "GET",
        dataType: "json",
        success: function (data) {
            console.log(data);
            printProdaje(data);
        },
        error: function (xhr, status, error) {
            console.log(xhr);
          console.log(error);
        }
    });
    
}

function printProdaje(data) {
    console.log(data);
    let html = '';
    for(let d of data) {
        html += printProdaju(d);
    }
    $('#prodajeLista').html(html);
}

function printProdaju(data) {
    return `
    <tr>
                                <th scope="row">${data.nazivKlijent}</th>
                                <td>${data.nazivUsluga}</td>
                                <td>${data.cena}</td>
                                <td>${data.datumUsluge}</td>
                                <td><a href="index.php?page=prodaje&action=generatePdf&id=${data.id}"><button type="button" class="btn btn-danger-outline">Generiši PDF fakturu</button></a></td>
                            </tr>
    `;
}




///////////////////////////////////////////////////




function searchKlijente() {
    let value = $(this).val();
    console.log(value);


    $.ajax({
        url: "index.php?page=searchKlijenti&valueSearch=" + value,
        method: "GET",
        dataType: "json",
        success: function (data) {
            console.log(data);
            printKlijente(data);
        },
        error: function (xhr, status, error) {
            console.log(xhr);
            console.log(error);
        }
    });

}

function printKlijente(data) {
    console.log(data);
    let html = '';
    for(let d of data) {
        html += printKlijenta(d);
    }
    $('#klijentiLista').html(html);
}

function printKlijenta(data) {
    return `
    <tr>
                                <th scope="row">${data.naziv}</th>
                                <td>${data.delatnost}</td>
                                <td>${data.PIB}</td>
                                <td>${data.datum_partnerstva}</td>                               
                                 <td><a href="index.php?page=klijent&action=izmeni&id=${data.id}>"><button type="button" class="btn btn-danger-outline">Izmeni</button></a></td>
                                <td><a href="index.php?page=klijent&action=obrisi&id=${data.id}"><button type="button" class="btn btn-danger-outline">Obriši</button></a></td>
                                <td><a href="index.php?page=klijenti&action=klijentProfile&id=${data.id}"><button type="button" class="btn btn-danger-outline">Sve prodaje ovom klijentu</button></a></td>
                            </tr>
    `;
}
