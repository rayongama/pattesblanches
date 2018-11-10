document.addEventListener("DOMContentLoaded", () => {

    const observer = new IntersectionObserver((observables) => {
        observables.forEach((o) => {
            if (o.intersectionRatio > 0) {
                document.querySelector("img.header").classList.add("reduced");
                document.querySelector("header").classList.add("reduced");
            }
            if (o.intersectionRatio > 0.3) {
                o.target.classList.remove("not-visible");
            } else {
                o.target.classList.add("not-visible");
            }
        });
    }, {
        threshold: [0.3]
    });
    let items = document.querySelectorAll("#container img");
    items.forEach(i => {
        i.classList.add("not-visible");
        observer.observe(i);
    });

    document.querySelector("a[href='/cosplay']").addEventListener("click", e => {
        e.preventDefault();
        window.history.pushState({page: "cosplay"}, "cosplay", "cosplay");
        document.querySelectorAll("#container img:not(.cosplay)").forEach(e => {
            e.classList.add("none");
        });
    });

    document.querySelectorAll("a[href='/']").forEach(e => {
        e.addEventListener("click", e => {
            e.preventDefault();
            window.history.pushState({page: "/"}, "/", "/");
            document.querySelectorAll("#container img").forEach(e => {
                e.classList.remove("none");
            });
        });
    });
});

