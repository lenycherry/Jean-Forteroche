class CommentAdmin {
    constructor(title_chapter_comment) {
        this.titleChapterComment = document.querySelectorAll(title_chapter_comment);
        this.commentContainer = document.querySelectorAll('.admin_comments_content');

        for (let i = 0; i < this.titleChapterComment.length; i++) {
            this.titleChapterComment[i].addEventListener("click", e => {
                let container = this.commentContainer[i]
                this.toggleContainer(container)
            })
        }
    }
    toggleContainer(container) {
        if (container.classList.contains('com_invisible')) {
            container.classList.replace('com_invisible', 'com_visible')
        } else if (container.classList.contains('com_visible')) {
            container.classList.replace('com_visible', 'com_invisible')
        }

    };
};