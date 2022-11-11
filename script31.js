

var AK = "online";
const date = new Date();

const renderCalendar = () => {
    
    
    
  date.setDate(1);

  const monthDays = document.querySelector(".days");

  const lastDay = new Date(
    date.getFullYear(),
    date.getMonth() + 1,
    0
  ).getDate();

  const prevLastDay = new Date(
    date.getFullYear(),
    date.getMonth(),
    0
  ).getDate();

  const firstDayIndex = date.getDay();

  const lastDayIndex = new Date(
    date.getFullYear(),
    date.getMonth() + 1,
    0
  ).getDay();

  const nextDays = 7 - lastDayIndex - 1;

  const months = [
    "Styczeń",
    "Luty",
    "Marzec",
    "Kwiecień",
    "Maj",
    "Czerwiec",
    "Lipiec",
    "Sierpień",
    "Wrzesień",
    "Październik",
    "Listopad",
    "Grudzień",
    
  ];
  
 

  document.querySelector(".date h1").innerHTML = months[date.getMonth()];
  document.querySelector(".date h2").innerHTML = date.getFullYear();
  document.querySelector(".date p").innerHTML = new Date().toDateString();

  let days = "";

  for (let x = firstDayIndex; x > 0; x--) {
    days += `<div class="prev-date">${prevLastDay - x + 1}</div>`;
  }
  
    if (typeof Active === 'undefined')
    {
        for (let i = 1; i <= lastDay; i++)
        {
            if(i === new Date().getDate() &&
      date.getMonth() === new Date().getMonth() && date.getFullYear() === new Date().getFullYear())
            {
                days += `<div class="today">${i}</div>`;
            }
            else
            {
                days += `<div>${i}</div>`;
            }
        }
    }
    else
    {

  for (let i = 1; i <= lastDay; i++) {
    if (Active.includes(((date.getFullYear()).toString()) + (i.toString() + "d") + ((date.getMonth() +1 ).toString())))
    {
      
        let a= 0;
        let t = 0;
        let d = 0;
        let tl = 0;
        let idk = 0;
        
        while(Active[a] != (((date.getFullYear()).toString()) + (i.toString() + "d") + ((date.getMonth() +1 ).toString())))
        {
            a++;
            t++;
            d++;
            tl++;
            idk++;
        }

        idk = IDK[idk];
        a = Forma[a];
        t = GSH[t] + ':' + GSM[t] + '  -  ' + GKH[t] + ':' + GKM[t];
        d = D[d];
        tl = TL[tl];
        var nd = new Date(d);
        var nd2 = new Date();
        //nd2.setDate(nd2.getDate()-1);
        
        if(a == AK && nd > nd2 && tl > 0)
        {
        days += `
        
        <div class="tooltip">
                    
        <span class="tooltipText">
        
        Forma: ${a}
        </br>
        Data: ${d}
        </br>
        Czas trwania: ${t}
        
        </span>
        <span>
        
        <a style="text-decoration: none; color: white" href="formularz.php?idk=${idk}"><div class="active">${i}</div></a>
        </span>
           
        </div>
        
        `;
        }
        
        else if(a == AK && nd > nd2 && tl == 0)
        {
        days += `
        
        <div class="tooltip">
                    
        <span class="tooltipText2" style="color: red">
        
        Forma: ${a}
        </br>
        Data: ${d}
        </br>
        Czas trwania: ${t}
               </br>
        BRAK WOLNYCH MIEJSC
        
        </span>
        <span>
        
       <div class="full">${i}</div>
        </span>
           
        </div>
        
        `;
        }
        
            else if ( i === new Date().getDate() &&
      date.getMonth() === new Date().getMonth() && date.getFullYear() === new Date().getFullYear())
    {
        
        days += `<div class="today">${i}</div>`;
        
    }
        
        else
        {
            days += `<div>${i}</div>`;
        }
      
    } 
    
    
    
    else if ( i === new Date().getDate() &&
      date.getMonth() === new Date().getMonth() && date.getFullYear() === new Date().getFullYear()
)
    {
        
        days += `<div class="today">${i}</div>`;
        
    }
    
    else {
      days += `<div>${i}</div>`;
    }
  }
    }

  for (let j = 1; j <= nextDays; j++) {
    days += `<div class="next-date">${j}</div>`;
   
  }
  monthDays.innerHTML = days;
};

document.querySelector(".prev").addEventListener("click", () => {
  date.setMonth(date.getMonth() - 1);
  renderCalendar();
});

document.querySelector(".next").addEventListener("click", () => {
  date.setMonth(date.getMonth() + 1);
  renderCalendar();

});

renderCalendar();

            	    var btn = document.getElementById('btn');
            	    
            	    

                    function leftClick() {
                    	btn.style.left = '0';
                    	AK = "online";
                    	
                        renderCalendar();
                    	
                    }
                    
                    function rightClick() {
                    	btn.style.left = '120px';
                    	AK = "stacjonarna";
                    	
                        renderCalendar();
                    }