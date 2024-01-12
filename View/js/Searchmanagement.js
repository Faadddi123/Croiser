var wikis = [];

function get_data(whatiwant) {
   var result = [];
   
   let myRequest = new XMLHttpRequest();
   myRequest.open("GET", "index.php?action=seepage&" + whatiwant, true);
   console.log("index.php?action=seepage&" + whatiwant);
   myRequest.onreadystatechange = function () {
       if (this.readyState === 4) {
           if (this.status === 200) {
               result = JSON.parse(this.responseText);
               console.log(result);
               
               wikis = result;
               console.log(wikis);
               // Do any actions or updates related to the data here
           
           } else {
               console.error("Failed to fetch data");
           }
       }
   };

   myRequest.send();
}
function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
  }


let SearchAffichage = document.getElementById('Searchresult');
let SearchButton = document.getElementById('search-icon-1-10');
let searchText = document.getElementById('SearchText');
searchText.addEventListener("input", function() {
    let howtoseach = '';
    // Get the current value of the input field
    const whatIPressed = searchText.value;
    if(whatIPressed[0] == "#"){
        howtoseach = 'tag='+ whatIPressed.substring(1);
    } else if(whatIPressed[0] == "@"){
        howtoseach = 'category='+ whatIPressed.substring(1);
    } else {
        howtoseach = 'title='+ whatIPressed;
    }

    // Call the function to fetch data
    get_data(howtoseach);
  
    loop_to_display();
    
});


function loop_to_display(){
    SearchAffichage.innerHTML = '';
    for(let i = 0 ; i< wikis.length ; i++){
        displaytheSearches(wikis[i]);
    }
}

console.log(SearchButton);
SearchButton.addEventListener('click', function(){
    

    SearchAffichage.innerHTML = '';
    
    for(let i = 0 ; i< wikis.length ; i++){
        displaytheSearches(wikis[i]);
    }
    
})
let tags_filter = document.querySelectorAll('.Server-Dial-Da7k-LNKa');
tags_filter.forEach(function (x){
    x.addEventListener('click', function(){
        console.log(x.innerText);
        theValueoftag = x.innerText.trim();
        howtoseach = 'tag='+theValueoftag;
        get_data(howtoseach);
        
        sleep(1000).then(() => { loop_to_display(); });
        
        // Get the current value of the input field
    })
})
let tags_category = document.querySelectorAll('.Debana-fer3at-ras-youbix');
tags_category.forEach(function (x){
    x.addEventListener('click', function(){
        console.log(x.innerText);
        theValueofcategory = x.innerText.trim();
        howtoseach = 'category='+theValueofcategory.toLowerCase();
        get_data(howtoseach);
        
        sleep(1000).then(() => { loop_to_display(); });
        // Get the current value of the input field
    })
})
function displaytheSearches(dkashi){
  
    let i = 0;
    let search = document.createElement('div');
    search.id = 'hi';
    search.innerHTML = `
    <div class="mb-4">
                            <a href="index.php?action=affichage&id=${dkashi['id']}" class="h1 display-5">${dkashi['title']}</a>
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

    for(var y = 0 ; y < ananadi.length ; y++){

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


