!function(e){if(e("#dokan-geolocation-product-location").length){u.prototype.onAdd=function(e){var o=this;this._map=e;var t=document.createElement("i");t.className="fa fa-search";var a=document.createTextNode("Search Map"),n=document.createElement("button");n.type="button",n.appendChild(t),n.appendChild(a),n.addEventListener("click",(function(e){e.preventDefault();var t=document.getElementById(o._mapId).getElementsByClassName("mapboxgl-ctrl-top-left")[0];t.className=t.className+" show-geocoder"}));var d=document.createElement("div");return d.className="mapboxgl-ctrl mapboxgl-ctrl-group dokan-mapboxgl-ctrl",d.appendChild(n),this._container=d,this._container},u.prototype.onRemove=function(){this._container.parentNode.removeChild(this._container),this._map=void 0};var o,t,a,n,d,l,c,i,r=e("#_dokan_geolocation_use_store_settings"),s={};r.on("change",(function(){e("#dokan-geolocation-product-location-no-store-settings").toggleClass("dokan-hide"),e("#dokan-geolocation-product-location").toggleClass("dokan-hide"),r.is(":checked")||o||p()}));var g=e("#dokan-geolocation-product-location").find(".locate-icon");navigator.geolocation?g.on("click",(function(){navigator.geolocation.getCurrentPosition((function(e){var t=e.coords.latitude,a=e.coords.longitude;i.setLngLat([a,t]),o.setCenter([a,t]),_({latitude:t,longitude:a})}))})):g.addClass("dokan-hide"),r.is(":checked")||p(),e("#dokan-map-add").on("input",(function(e){_({address:e.target.value})}))}function u(e){this._mapId=e}function p(){a="dokan-geolocation-product-location-map",t=e('[name="_dokan_geolocation_mapbox_access_token"]').val(),n=e('[name="_dokan_geolocation_product_dokan_geo_latitude"]'),d=e('[name="_dokan_geolocation_product_dokan_geo_longitude"]'),l=e("#_dokan_geolocation_product_location"),s={latitude:n.val(),longitude:d.val(),address:l.val(),zoom:12},mapboxgl.accessToken=t,(o=new mapboxgl.Map({container:a,style:"mapbox://styles/mapbox/streets-v10",center:[s.longitude,s.latitude],zoom:s.zoom})).addControl(new mapboxgl.NavigationControl),o.addControl(new u(a),"top-left"),o.on("load",(function(){c=new MapboxGeocoder({accessToken:mapboxgl.accessToken,mapboxgl,zoom:o.getZoom(),placeholder:"Search Address",marker:!1,reverseGeocode:!0}),o.addControl(c,"top-left"),c.setInput(s.address),c.on("result",(function(e){var t=e.result,a=t.center,n=t.place_name;i.setLngLat(a),o.setCenter([a[0],a[1]]),_({address:n,latitude:a[1],longitude:a[0]})}))})),i=new mapboxgl.Marker({draggable:!0}).setLngLat([s.longitude,s.latitude]).addTo(o).on("dragend",m)}function m(){var t=c.geocoderService.client.origin,a=c.geocoderService.client.accessToken,n=i.getLngLat().wrap().lng,d=i.getLngLat().wrap().lat;o.setCenter([n,d]),_({latitude:d,longitude:n});var l=t+"/geocoding/v5/mapbox.places/"+n+"%2C"+d+".json?access_token="+a+"&cachebuster="+ +new Date+"&autocomplete=true";c._inputEl.disabled=!0,c._loadingEl.style.display="block",jQuery.ajax({url:l,method:"get"}).done((function(t){t.features&&(c._typeahead.update(t.features),e(o._controlContainer).find(".mapboxgl-ctrl-top-left").addClass("show-geocoder"))})).always((function(){c._inputEl.disabled=!1,c._loadingEl.style.display=""}))}function _(e){s=Object.assign(s,e),n.val(s.latitude),d.val(s.longitude),l.val(s.address)}}(jQuery);