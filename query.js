import getCurProg from progress.php;
import Progress from progress.php;

var currentProg = getCurProg();
var sidebar = document.getElementsByClassName("sidebar");
var pages = sidebar.getElementsByTagName("a");

console.log(currentProg);
console.log(pages);

for (const page in pages) {
    if (page.name == currentProg){
        page.classList.add("current");
    }else if(page.name < currentProg){
        page.classList.add("done");
    }else{
        page.classList.add("disabled");
    }
}

function check(question) {
    if (question == 0){
        if (document.getElementById("imp1").value == "string" && document.getElementById("imp2").value == "public" && document.getElementById("imp3").value == "=5f;" && document.getElementById("K1").value == "3"){
            alert("You answered well! Keep going!");
            Progress(1);
        } else {
            alert("Unfortunately you missed something! Try again!");
        }
    } else if (question == 1){
        if (document.getElementById("K2").value == "1" && document.getElementById("K3").value == "1" && document.getElementById("K4").value == "3"){
            alert("You answered well! Keep going!");
            Progress(2);
        } else {
            alert("Unfortunately you missed something! Try again!");
        }
    
    } else if (question == 2){
        if (document.getElementById("K5").value == "2" && document.getElementById("imp4").value == "Debug.log(" && document.getElementById("imp5").value == "GameObject MyGameObject" && document.getElementById("imp6").value == "new GameObject("){
            alert("You answered well! Keep going!");
            Progress(3);
        } else {
            alert("Unfortunately you missed something! Try again!");
        }
    }
}