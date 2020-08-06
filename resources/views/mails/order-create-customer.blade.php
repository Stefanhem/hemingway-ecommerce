<div>
    <h1 style="text-align: center">VAŠA NARUDŽBINA JE USPEŠNO KREIRANA</h1>
    <p>Poštovani/a Petre,</p>
    <p>
        Hvala Vam za kupovinu u našem shop-u.<br/>
        Vaša narudžbina je uspešno primljena, a da bi ista bila ptvrđena potrebno je da u roku od 2
        radna dana izvršite uplatu prema navedenim instrukcijama:
    </p>
    <p>
        Čim uplata bude evidentirana mi ćemo Vas obavestiti putem email-a, i nastaviti sa
        procesuiranjem narudžbine. Rok za slanje pošiljke je 5 dana od trenutka evidentiranja uplate, ali
        svakako ćemo nastojati da taj rok bude i kraći.<br/><br/>
        Molimo vas da još jednom proverite podatke narudžbine, i ako slučajno uočite neku grešku da
        nas kontaktirate najkasnije u roku od 30 minuta.
    </p>
    <p>
        <strong>
            Broj narudžbine #{{$data['id']}}.<br/>
            Datum {{$data['date']}}
        </strong>
    </p>
    <table style="border-collapse: collapse;border: 1px solid black;">
        <tr style="border: 1px solid black;">
            <td style="border: 1px solid black;">Proizvod</td>
            <td style="border: 1px solid black;">Količina</td>
            <td style="border: 1px solid black;">Cena</td>
        </tr>
        @foreach($data['products'] as $product)
            <tr style="border: 1px solid black;">
                <td style="border: 1px solid black;">{{$product['product']->name}}</td>
                <td style="border: 1px solid black;">{{$product['quantity']}}</td>
                <td style="border: 1px solid black;">{{$product['price']}}</td>
            </tr>
        @endforeach
    </table>
</div>
