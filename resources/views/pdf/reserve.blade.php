
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

<h2>Thanks for your Reservation</h2>
<h3 style="padding: 7px">here is your reservation datiails</h3>

<h1>Code: </h1><h1 style="padding: 7px;background:#c9c9c9;color: rgb(10, 175, 106)">{{$reservation->secret_code}}</h1>
<table>
    <tr>
        <td>Name: {{$reservation->name}}</td>
    </tr>
    <tr>
        <td>Day: {{date('Y-m-d')}}</td>
    </tr>
    <tr>
        <td>Duration: {{$reservation->duration}}</td>
    </tr>
    <tr>
        <td>Phone: {{$reservation->phone}}</td>
    </tr> 
    <tr>
        <td>Email: {{$reservation->email}}</td>
    </tr> 
    
</table>

</body>
</html>

