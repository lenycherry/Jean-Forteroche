class MenuAdmin {
    constructor(admin_chapters_btn, admin_comments_btn, admin_reported_btn) {
        this.adminChapterBtn = document.getElementById(admin_chapters_btn);
        this.adminCommentBtn = document.getElementById(admin_comments_btn);
        this.adminReportedBtn = document.getElementById(admin_reported_btn);


        this.adminChapterBtn.addEventListener("click", e => {
            let container = document.getElementById('admin_chapter')
            this.toggleContainer(container)
        })
        this.adminCommentBtn.addEventListener("click", e => {
            let container = document.getElementById('admin_comment')
            this.toggleContainer(container)
        })
        this.adminReportedBtn.addEventListener("click", e => {
            let container = document.getElementById('admin_comment_reported')
            this.toggleContainer(container)
        })
    }

    toggleContainer(container) {
        if (container.classList.contains('invisible')) {
            container.classList.replace('invisible', 'visible')
        } else if (container.classList.contains('visible')) {
            container.classList.replace('visible', 'invisible')
        }

    };


};