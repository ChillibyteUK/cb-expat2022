var map;
var markers = [];

var baseurl = '/wp-content/themes/cb-expat2022';

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: new google.maps.LatLng(20, 0),
        zoom: 2,
        mapTypeId: 'terrain'
    });
    var infoWindow = new google.maps.InfoWindow;

    downloadUrl(baseurl + '/rankfeed.php', function(data) {
        var xml = data.responseXML;
        ranks = xml.documentElement.getElementsByTagName('marker');
        var i = 0;
        var sidebar = document.getElementById('sidebar');
        Array.prototype.forEach.call(ranks, function(markerElem) {

            var country = markerElem.getAttribute('country');
            var cc = markerElem.getAttribute('cc');
            var id = markerElem.getAttribute('id');
            var rank = markerElem.getAttribute('rank');
            var flag = markerElem.getAttribute('flag');
            var salary = markerElem.getAttribute('salary');
            var hours = markerElem.getAttribute('hours');
            var cost = markerElem.getAttribute('living');

            var point = new google.maps.LatLng(
                parseFloat(markerElem.getAttribute('lat')),
                parseFloat(markerElem.getAttribute('lng')));

            var lat = markerElem.getAttribute('lat');
            var lng = markerElem.getAttribute('lng');
            var zoom = markerElem.getAttribute('zoom');

            var infowincontent = document.createElement('div');
            infowincontent.className = 'infowin';

            var flagdiv = document.createElement('div');
            flagdiv.className = 'flag';
            var img = document.createElement('img');
            img.className = 'flag-image';
            img.src = flag;
            flagdiv.appendChild(img);
            infowincontent.appendChild(flagdiv);

            var rankdiv = document.createElement('div');
            rankdiv.className = 'infoRank';
            rankdiv.textContent = rank;
            infowincontent.appendChild(rankdiv);

            var titlediv = document.createElement('div');
            titlediv.className = 'title';
            titlediv.textContent = country;
            infowincontent.appendChild(titlediv);

            var salarydiv = document.createElement('div');
            salarydiv.className = 'salary';
            var salarydivtitle = document.createElement('div');
            salarydivtitle.className = 'subtitle';
            salarydivtitle.textContent = 'Salary Spent on Living Costs';
            var salarydivcontent = document.createElement('div');
            salarydivcontent.className = 'value';
            salarydivcontent.textContent = salary + '%';

            salarydiv.appendChild(salarydivtitle);
            salarydiv.appendChild(salarydivcontent);
            infowincontent.appendChild(salarydiv);

            var hoursdiv = document.createElement('div');
            hoursdiv.className = 'hours';
            var hoursdivtitle = document.createElement('div');
            hoursdivtitle.className = 'subtitle';
            hoursdivtitle.textContent = 'Average Working Hours';
            var hoursdivcontent = document.createElement('div');
            hoursdivcontent.className = 'value';
            hoursdivcontent.textContent = hours;

            hoursdiv.appendChild(hoursdivtitle);
            hoursdiv.appendChild(hoursdivcontent);
            infowincontent.appendChild(hoursdiv);

            var costdiv = document.createElement('div');
            costdiv.className = 'cost';
            var costdivtitle = document.createElement('div');
            costdivtitle.className = 'subtitle';
            costdivtitle.textContent = 'Average Cost of Living';
            var costdivcontent = document.createElement('div');
            costdivcontent.className = 'value';
            costdivcontent.textContent = '$' + cost;

            costdiv.appendChild(costdivtitle);
            costdiv.appendChild(costdivcontent);
            infowincontent.appendChild(costdiv);

            infowincontent.appendChild(document.createElement('br'));

            var lnk = document.createElement('a');

            var text = document.createTextNode('Find out more');
            lnk.appendChild(text);
            lnk.href=('#'+cc);
            infowincontent.appendChild(lnk);
            var marker = new google.maps.Marker({
                map: map,
                position: point,
            });
            marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
            });

            markers.push(marker);

            var rankContainer = document.createElement('div');
            rankContainer.className = 'rank';

            var rankflag = document.createElement('div');
            rankflag.className = 'flag';
            var rimg = document.createElement('img');
            rimg.className = 'flag-image';
            rimg.src = flag;
            rankflag.appendChild(rimg);
            rankContainer.appendChild(rankflag);

            var title = rank + ' ' + country;


            var rankTitle = document.createElement('h5');
            var rankName = document.createTextNode(title);
            rankTitle.appendChild(rankName);
            rankContainer.appendChild(rankTitle);


            var showLink = document.createElement('a');
            showLink.className = 'showLink';
            var show = 'Show on map';
            
            var mapLink = document.createTextNode(show);
            showLink.appendChild(mapLink);
            showLink.href = "";
            var action = document.createAttribute('onclick');
            // action.value = "return clicked("+i+");";
            action.value = "return clicked("+i+','+lat+','+lng+','+zoom+');';
            showLink.setAttributeNode(action);

            // var actionh = document.createAttribute('onmouseover');
            // actionh.value = "return hovered("+i+");";
            // showLink.setAttributeNode(actionh);

            rankContainer.appendChild(showLink);

            var viewLink = document.createElement('a');
            viewLink.className = 'infoLink';
            var view = 'View info';

            var pageLink = document.createTextNode(view);
            viewLink.appendChild(pageLink);
            viewLink.href = ('#'+cc);

            rankContainer.appendChild(viewLink);

            document.getElementById('sidebar').appendChild(rankContainer);


            i++;
        });
    });
    recentre('<?=$cc?>');
}

function downloadUrl(url,callback) {
    var request = window.ActiveXObject ?
        new ActiveXObject('Microsoft.XMLHTTP') :
        new XMLHttpRequest;

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
        }
    };

    request.open('GET', url, true);
    request.send(null);
}

function clicked(id,lat,lng,zoom) {
    google.maps.event.trigger(markers[id], 'click');
    // map.setZoom(2);
    // setTimeout("map.setZoom(2)",100)
    myLocation = { lat: lat, lng: lng };
    map.panTo(myLocation);
    myZoom = zoom;
    map.setZoom(myZoom);
    // setTimeout("map.setZoom("+myZoom+")",500)
    // recentre(id);
    return false;
}
function hovered(id) {
    google.maps.event.trigger(markers[id], 'mouseover');
    console.log('hovered');
    return false;
}
function doNothing() {}

function recentre(id,mylat,mylng,zoom) {
    myLocation = { lat: mylat, lng: mylng };
    myZoom = zoom;
    map.panTo(myLocation);
    map.setZoom(myZoom);
}

function toggleGroup(type) {
    for (var i = 0; i < markerGroups[type].length; i++) {
        var marker = markerGroups[type][i];
        if (!marker.getVisible()) {
            marker.setVisible(true);
        }
        else {
            marker.setVisible(false);
        }
    }
}

function isEmptyOrSpaces(str){
    return str === null || str.match(/^ *$/) !== null;
}