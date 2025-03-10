let autocomplete;let address1Field;let address2Field;let postalField;function initAutocomplete(){address1Field=document.querySelector(".your_address");yourAddress=document.querySelector(".yourAddress");address2Field=document.querySelector("#address2");postalField=document.querySelector("#postcode");autocomplete=new google.maps.places.Autocomplete(address1Field,{fields:["address_components","geometry"],types:["(cities)"],});address1Field.focus();autocomplete.addListener("place_changed",fillInAddress)}
function fillInAddress(){const place=autocomplete.getPlace();let address1="";let postcode="";var city_country="";for(const component of place.address_components){const componentType=component.types[0];switch(componentType){case "street_number":{address1=`${component.long_name} ${address1}`;break}
case "route":{address1+=component.short_name;break}
case "postal_code":{postcode=`${component.long_name}${postcode}`;break}
case "postal_code_suffix":{postcode=`${postcode}-${component.long_name}`;break}
case "locality":document.querySelector('[name="ciudad_de_la_propiedad"]').value=component.long_name;city_country+=component.long_name+", ";break;case "administrative_area_level_1":{city_country+=component.long_name+", ";break}
case "country":document.querySelector('[name="pais_de_la_propiedad"]').value=component.long_name;city_country+=component.long_name;break}
console.log(component);console.log(city_country)}
address1Field.value=city_country;jQuery('[name="yourAddress"]').val(city_country)}
window.initAutocomplete=initAutocomplete