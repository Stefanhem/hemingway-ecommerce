<div>
  <h1 style="text-align: center">VAŠA NARUDŽBINA JE PRIHVAĆENA</h1>
  <p>Poštovani/a,</p>
  <p>
    Hvala Vam za kupovinu u našem shop-u.<br />
    Ovim putem želimo da potvrdimo Vašu narudžbinu i da Vas obavestimo da, iako je krajnji rok za
    slanje pošiljke 5 dana od dana prijema narudžbine, isporuku možete očekivati već u naredna
    dva do tri dana.
  </p>
  <p>
    Čim uplata bude evidentirana mi ćemo Vas obavestiti putem email-a, i nastaviti sa
    procesuiranjem narudžbine. Rok za slanje pošiljke je 5 dana od trenutka evidentiranja uplate, ali
    svakako ćemo nastojati da taj rok bude i kraći.<br /><br />
    Molimo vas da još jednom proverite podatke narudžbine, i ako slučajno uočite neku grešku da
    nas kontaktirate najkasnije u roku od 30 minuta.
  </p>
  <p>
    <strong>
      Broj narudžbine #{{$data['id']}}.<br />
      Datum {{$data['date']}}
    </strong>
  </p>
  <table style="border-collapse: collapse;border: 1px solid black; width:50%">
    <tr style="border: 1px solid black;">
      <td style="border: 1px solid black;"><strong>Proizvod</strong></td>
      <td style="border: 1px solid black;"><strong>Količina</strong></td>
      <td style="border: 1px solid black;"><strong>Cena</strong></td>
    </tr>
    @foreach($data['products'] as $product)
    <tr style="border: 1px solid black;">
      <td style="border: 1px solid black;">{{$product['product']->name}}</td>
      <td style="border: 1px solid black;">{{$product['quantity']}}</td>
      <td style="border: 1px solid black;">{{$product['price'] . ' RSD'}}</td>
    </tr>
    @endforeach
    <tr style="border: 1px solid black;">
      <td style="border: 1px solid black;"><strong>Ukupan iznos naručenih proizvoda</strong></td>
      <td style="border: 1px solid black;" colspan="2">{{$data['sum'] . ' RSD'}}</td>
    </tr>
    <tr style="border: 1px solid black;">
      <td style="border: 1px solid black;"><strong>Troškovi dostave</strong></td>
      @if (!isset($isFreeDelivery))
      <td style="border: 1px solid black;" colspan="2">{{'Cena dostave je 300,00 rsd, a plaća se gotovinski kuriru prilikom dostave'}}</td>
      @else
      <td style="border: 1px solid black;" colspan="2">{{'Besplatna dostava'}}</td>
      @endif
    </tr>
    <tr style="border: 1px solid black;">
      <td style="border: 1px solid black;"><strong>Način plaćanja</strong></td>
      <td style="border: 1px solid black;" colspan="2">{{$data['paymentMethod']}}</td>
    </tr>
  </table>

  <p>Informacije za dostavu:</p>
  <span style="padding:10px;border: 1px solid #000;height:100px;width:300px;display:block">
    {{$data['deliveryName']}} <br />
    {{$data['address']}}<br />
    {{$data['deliveryPhone']}}
  </span>
</div>