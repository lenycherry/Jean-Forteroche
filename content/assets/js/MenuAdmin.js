class MenuAdmin {
    constructor(admin_chapters_btn, admin_comments_btn, admin_reported_btn) {
        this.adminChapterBtn = document.getElementById(admin_chapters_btn);
        this.adminCommentBtn = document.getElementById(admin_comments_btn);
        this.adminReportedBtn = document.getElementById(admin_reported_btn);


        this.adminChapterBtn.addEventListener("click", e => {
            this.closeAll()
            let container = document.getElementById('admin_chapter')
            this.openContainer(container)
        })
        this.adminCommentBtn.addEventListener("click", e => {
            this.closeAll()
            let container = document.getElementById('admin_comment')
            this.openContainer(container)
        })
        this.adminReportedBtn.addEventListener("click", e => {
            this.closeAll()
            let container = document.getElementById('admin_comment_reported')
            this.openContainer(container)
        })
    }
    openContainer(container) {
        if (container.classList.contains('invisible')) {
            container.classList.replace('invisible', 'visible')
        }
    };
    closeAll() {
        let containers = document.getElementsByClassName('visible')
        for (let i = 0; i < containers.length; i++) {
            containers[i].classList.replace('visible', 'invisible')
        }
    }
};