function check(){
          var str = document.sform.swindow.value;
          if(str == ''){
              void(0);
            return false;
            }
          if(!str.match(/\S/g)){
            void(0);
            return false;
          }
        }
  