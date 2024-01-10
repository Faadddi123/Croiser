var wikis = [];

// var wikies;
function get_data() {
   var result;
   
   let myRequest = new XMLHttpRequest();
   myRequest.open("GET", "index.php?action=seepage", true);

   myRequest.onreadystatechange = function () {
       if (this.readyState === 4) {
           if (this.status === 200) {
               result = JSON.parse(this.responseText);
               console.log(result);
               wikis = result;
               // callback(result);
           } else {
               console.error("Failed to fetch data");
           }
       }
   };
  
   myRequest.send();
} 
get_data();
console.log(wikis);
let SearchAffichage = document.getElementById('Searchresult');
let SearchButton = document.getElementById('search-icon-1-10');
// let SearchText = document.getElementById('SearchText');
// SearchText.addEventListener("keypress", function(event) {
//     // If the user presses the "Enter" key on the keyboard
//     if (event.key === "Enter") {
//       // Cancel the default action, if needed
//       alert('hi');
//     }
//   });



console.log(SearchButton);
SearchButton.addEventListener('click', function(){
    
    console.log("work?");
    SearchAffichage.innerHTML = '';
    console.log(wikis.length);
    for(let i = 0 ; i< wikis.length ; i++){
        displaytheSearches(wikis[i]);
    }
    
})

function displaytheSearches(dkashi){
    console.log(dkashi);
    let i = 0;
    let search = document.createElement('div');
    search.id = 'hi';
    search.innerHTML = `
    <div class="mb-4">
                            <a href="#" class="h1 display-5">${dkashi['tag_names']}</a>
                        </div>
                        <div class="position-relative rounded overflow-hidden mb-3 d-flex gap-2">
                            <img src="View/img/news-1.jpg" class="img-zoomin img-fluid h-25 rounded col-4" alt="">
                            
                            <div  >
                            <p class="">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy Lorem Ipsum has been the industry's standard dummy type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic
                                
                            </p>
                            <div id="tagfor${dkashi['id']}" class = "d-flex">
                            </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="#" class="text-dark link-hover me-3"><i class="fa fa-clock"></i> 06 minute read</a>
                            <a href="#" class="text-dark link-hover me-3"><i class="fa fa-eye"></i> 3.5k Views</a>
                            <a href="#" class="text-dark link-hover me-3"><i class="fa fa-comment-dots"></i> 05 Comment</a>
                            <a href="#" class="text-dark link-hover"><i class="fa fa-arrow-up"></i> 1.5k Share</a>
                        </div>
                        
    `;

    SearchAffichage.appendChild(search);
    let tag_name = document.getElementById(`tagfor${dkashi['id']}`);
    
    ananadi = dkashi['tag_names'].split(',');
    console.log(ananadi.length);
    console.log(ananadi);
    for(var y = 0 ; y < ananadi.length ; y++){
        console.log(ananadi[y]);
        display_tags(ananadi[y])
    }
    function display_tags(tags){
        let i = 0;
        let display_tags = document.createElement('li');
        display_tags.className = 'nav-item mb-3 d-flex text-center';
        display_tags.innerHTML = 
        `
        <a class="d-flex py-2 bg-light rounded-pill me-2" href="#">
                <span class="text-dark link-hover" style="width: 90px;">${tags}</span>
        </a>
        `;
        tag_name.appendChild(display_tags);
    }
   
}