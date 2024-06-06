const arrows = document.querySelectorAll(".arrow");
const movielists = document.querySelectorAll(".movie-list");
arrows.forEach((arrow,i)=>{
    const itemlength = movielists[i].querySelectorAll("img").length;
    let clickcounter = 0;
    arrow.addEventListener("click",()=>{
        clickcounter++;
        if (itemlength - (4 + clickcounter) <= 0) {
            movielists[i].style.transform= "translateX(${movielists[i].computedStyleMap().get('transform')[0].x.value-300}px)";   
        }
        else{
            movielists[i].style.transform = "translateX(0)";
            clickcounter = 0;
        }
    });
});