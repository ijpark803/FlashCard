let search_global = document.getElementById("search-id").value;


document.getElementById("search_form").onsubmit = function(event){
    event.preventDefault();

    //Get the user's input 
    let searchInput = document.getElementById("search-id").value;
    console.log(searchInput);

    // convert spaces and special characters 
    let convertedSearchInput = encodeURIComponent(searchInput);

    // let test = "happy";
    // prepare the endpoint
    let endpoint = "https://www.dictionaryapi.com/api/v3/references/sd3/json/" + searchInput + "?key=07545865-caa4-4023-9e8b-221768c269ee";
  
    

    console.log(endpoint); 

    //Make HTTP request via AJAX
   let httpRequest = new XMLHttpRequest();
   //Create a request (initialize) .open()
   //first arg: the method  (GET OR POST)
   // 2nd arg: the endpoint
   httpRequest.open("GET", endpoint);
   httpRequest.send();
   //don't wait around for response, set up an event handler
   //below function will run when iTunes sends back a response
   httpRequest.onreadystatechange = function() {
       console.log(httpRequest.readyState);
       console.log("we got a response!");
       //check that we got response
       if(httpRequest.readyState == 4){
           //check if response was successful
           if(httpRequest.status == 200){
               //log out response from iTunes
               console.log(httpRequest.responseText);
               console.log(JSON.parse(httpRequest.responseText));
               displayResults(httpRequest.responseText);
           }
           else{ 
               alert("AJAX error!!");
               console.log(httpRequest.status);
           }
       }
   }
   console.log("moving on ....");

   // three different things happen when we send a request
   // makes sure its requested, read, and actually responce total 4 when loading is done

   //display the information

}

function displayResults(resultsString){ 
    //convert the JSON string to JS object
    let resultsJS = JSON.parse(resultsString);
    console.log(resultsJS);
    console.log(resultsJS[0]);
    console.log(search_global);
    //clear the previous search results
    document.getElementById("searched_word").replaceChildren();
    document.getElementById("searched_def").replaceChildren();
        if(typeof (resultsJS[0]) != 'object'){
            console.log("incorrect word");
            let htmlString =`
            <p>error</p>

            `;
            document.getElementById("searched_word").innerHTML += htmlString;
            let htmlStringDef =`
            <p>please check your spelling!</p>
            `;


            document.getElementById("searched_def").innerHTML += htmlStringDef; 
        }
        else{
            console.log("existing word");
            
            let htmlString =`
            <p> ${resultsJS[0].meta.id}</p>

            `;
            document.getElementById("searched_word").innerHTML += htmlString;
            let htmlStringDef =`
            <p> ${resultsJS[0].shortdef[0]}</p>
            `;


            document.getElementById("searched_def").innerHTML += htmlStringDef;

        }
 }


