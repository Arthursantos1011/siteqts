class  MobileNavbar{
    constructor(){
        this.mobileMenu = document.querySelector(this.mobileMenu);
        this.navList = document.querySelector(this.navList);
        this.navLinks = document.querySelectorAll(this.navLinks);
        this.activeClass = "active";
        this.handleClick = this.handleClick.bind(this);
    }

    handleClick(){
this.navList.classList.toggle(this.activeClass);
    }

    addClickEvent(){
        this.mobileMenu.addEventListener("click", () => console.log
        ("Hey"));
    }

    Init(){
    if(this.mobileMenu){
        this.addClickEvent();
    }
    return this;
    }
}

const MobileNavbar = new MobileNavbar(
    ".mobile-menu",
    ".nav-list",
    ".nav-list li",
);
MobileNavbar.Init();