//ONLINE
function updateOnlineUsers() {
    fetch('get_online_users.php')
        .then(response => response.json())
        .then(users => {
            const userList = document.getElementById('online-user-list');
            userList.innerHTML = '';
  
            users.forEach(user => {
                const listItem = document.createElement('li');
                listItem.textContent = user.username;
                userList.appendChild(listItem);
            });
        })
        .catch(error => console.error('Error fetching online users:', error));
  }
  

  setInterval(updateOnlineUsers, 1000);
  //READ
  
  let msgdiv=document.querySelector(".msg");
  setInterval(() => {
    fetch("readMsg.php").then(
      r=>{
        if(r.ok){
          return r.text();
        }
      }
    ).then(
      d=>{
        msgdiv.innerHTML=d;
        msgdiv.scrollTop = msgdiv.scrollHeight;
      }
    )
    
  }, 300);
  
  
  
  
  
  //ADD
  window.onkeydown=(e)=> {
    if(e.key=="Enter"){
      update();
    }
  }
  function scrollToBottom() {
    msgdiv.scrollTop = msgdiv.scrollHeight;
  }
  
  function update(){
    let msg = input_msg.value;
    input_msg.value="";
    fetch(`addMsg.php?msg=${msg}`).then(
      r=>{
        if(r.ok){
          return r.text();
          
        }
      }
    ).then(
      d=>{
        console.log("msg has been added");
        msgdiv.scrollTop = msgdiv.scrollHeight;
        
      }
  
      
    )
  }
  
  
  //MOBILE
  function toggleMobileMenu() {
    const onlineUsers = document.getElementsByClassName('online-users')[0];
    if (onlineUsers.style.left === '0px') {
        onlineUsers.style.left = '-200px'; 
    } else {
        onlineUsers.style.left = '0px'; 
    }
  }
  
  
  document.getElementById('mobile-menu-toggle').addEventListener('click', toggleMobileMenu);
  
  
  
  
  const mobileMenuToggle = document.getElementById("mobile-menu-toggle");
  const toggleMenu = document.querySelector(".toggle-menu");
  
  mobileMenuToggle.addEventListener("click", () => {
    toggleMenu.style.left = "0px";
  
    setTimeout(() => {
      toggleMenu.style.left = "0px";
    }, 300);
  });