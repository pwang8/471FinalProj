<?php include("Header.php")?>

<script src="http://maps.googleapis.com/maps/api/js"></script>
<script>
    var myCenter=new google.maps.LatLng(51.079944, -114.138777);
    var marker;
    
    function initialize() {
        var mapProp = {
            center:myCenter,
            zoom: 10,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map=new google.maps.Map(document.getElementById("googleMap"), mapProp);
        
        var marker=new google.maps.Marker({
            position:myCenter,
            animation:google.maps.Animation.BOUNCE,
            //icon:"logo.png"
        });
        
        marker.setMap(map);
    }
        
        google.maps.event.addDomListener(window, 'load', initialize);
        
    
</script>
<div align="center" id="main" style="padding:1cm">
    <div id="googleMap" style="width:800px;height:600px"></div>
</div>
<?php include("Footer.php")?>

