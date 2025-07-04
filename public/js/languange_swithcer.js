function setLanguage(lang){
    const flag = document.getElementById('flag-icon');

    if(lang =='id'){
        flag.src = 'https://flagcdn.com/w20/id.png';
        flag.alt = 'Indonesia';
    } else if(lang == 'eng'){
        flag.src = 'https://flagcdn.com/w20/gb.png'
        flag.alt = 'English';
    }
}
