// <html xmlns="http://www.w3.org/1999/xhtml">
// <head>
//     <title></title>
// </head>
// <body>
//     <textarea id="txtAddress" rows="3" cols="25"></textarea>
//     <br />
//     <input type="button" onclick="GetLocation()" value="Get Location" />
//     <div id="test"></div>
//     <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
//     <script type="text/javascript">
//     <!--
//         function GetLocation(fromdb) {
//             var geocoder = new google.maps.Geocoder();
//             var address = document.getElementById("txtAddress").value;
//             geocoder.geocode({ 'address': address }, function (results, status) {
//                 if (status == google.maps.GeocoderStatus.OK) {
//                     var latitude = results[0].geometry.location.lat();
//                     var longitude = results[0].geometry.location.lng();
//                     alert("Latitude: " + latitude + "\nLongitude: " + longitude); document.getElementById("test").innerHTML =
// latitude + "," + longitude;
//                 } else {
//                     alert("Request failed.")
//                 }
//             });
//         };
//         //-->
//     </script>
    
// </body>
// </html>
 