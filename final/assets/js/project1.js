/* index.php (Home Page) Map */
var map;
var infoWindow;

// Initialize and add the map
function initMap() {
    // The location of ABay
    const abay = { lat: 44.336842, lng: -75.918991 };
    // The map, centered at ABay
    map = new google.maps.Map(document.getElementById("map"), {
      zoom: 11,
      center: abay,
    });
    
    const boldtcastle = { lat: 44.3444108, lng: -75.923454 };
    const unclesam = { lat: 44.3387641, lng: -75.9195165 };
    const winery = { lat: 44.291274, lng: -75.9842687 };
    const theatre = { lat: 44.3211369, lng: -75.9067174 };
    const riveredge = { lat: 44.3390898, lng: -75.9175658 };
    const edgewood = { lat: 44.332684, lng: -75.9251857 };

    // The marker, positioned at ABay
    // const marker = new google.maps.Marker({
    //   position: abay,
    //   map: map,
    // });

    var places = [
    {
        latitude: 44.3444108,
        longitude: -75.923454, 
        title: "Boldt Castle"
    }, 

    {
        latitude: 44.3387641,
        longitude: -75.9195165, 
        title: "Uncle Sam Boat Tours"
    }, 

    {
        latitude: 44.291274,
        longitude: -75.9842687, 
        title: "TI Winery"
    }, 

    {
        latitude: 44.3211369,
        longitude: -75.9067174, 
        title: "Bay Drive-in Theatre"
    }, 

    {
        latitude: 44.3390898,
        longitude: -75.9175658, 
        title: "Riveredge Resort"
    }, 

    {
        latitude: 44.332684,
        longitude: -75.9251857, 
        title: "Edgewood Resort"
    }

    ]

    for(i=0; i < places.length; i++) {
        addMarker(places[i]['latitude'], places[i]['longitude'], places[i]['title']);
    }

}

function addMarker(latitude,longitude,title) {
    var position = {lat:latitude,lng:longitude};
    var marker = new google.maps.Marker({position: position, map:map});
    marker.setTitle(title);
    // Add a listener for the click event
    google.maps.event.addListener(marker, 'click', function(e){
        makeInfoWindow(this.position,this.title);
    });
}

function makeInfoWindow(position,msg){
    // Close old InfoWindow if it exists
    if(infoWindow) { 
        infoWindow.close();
    }
    // Make a new InfoWindow
    infoWindow = new google.maps.InfoWindow({
        map: map,
        position: position,
        content: "<b>" + msg + "</b>"
    });
}

/* comments.php: Feedback Page: Form Validation - Satisfaction Survey */
function validate(){
    // holder for true or false - form sends or not
    var ret=true;
    // test if user entered phone number if response to contact permission is Yes
    if(document.getElementById('phone').value=="" && document.getElementById('email').value=="" && document.getElementById('contact').value=="yes"){
        // Show red * if contact permission is Yes and phone number and email are blank
        document.getElementById('phone*').style.display='inline';
        document.getElementById('phone*').style.color='red';
        document.getElementById('email*').style.display='inline';
        document.getElementById('email*').style.color='red';
        // the phone and email failed (left blank), so change the return to false to not allow form to submit
        ret=false;
    } else{
        // In case the red * is showing, remove it
        document.getElementById('phone*').style.display='none';
        document.getElementById('email*').style.display='none';
    }

    // confirm date selected is not in the future
    var now = new Date();
    var dateSelected = new Date(document.getElementById('date').value);
     if(dateSelected > now) {
        // Show red * if date selected is in the future
        document.getElementById('date*').style.display='inline';
        document.getElementById('date*').style.color='red';
        return false;
    } else{
        // In case the red * is showing, remove it
        document.getElementById('date*').style.display='none';
    }

    return ret;
}

/* Navigation */

// declare variable
var menu = document.getElementById("menu");

/* Hamburger Menu */
function toggle() {
    // toggle code
    if(menu.style.display == "block") {
        menu.style.display = "none";
    } else {
        menu.style.display = "block";
    }
}

/* If nav is hidden with hamburger menu on small screen
    make sure if page is enlarged that the nav shows up
*/
function showNav() {
    var w = window.outerWidth;
    if(w >= 635) {
        menu.style.display = "inline-flex";
    }
}

