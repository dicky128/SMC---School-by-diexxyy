document.addEventListener("DOMContentLoaded", () => {

    const navbar = document.getElementById("navbar");

    window.addEventListener("scroll", () => {

        if (window.scrollY > 40) {

            navbar.style.transform =
                "translateX(-50%) translateY(-8px) scale(.98)";

            navbar.style.boxShadow =
                "0 40px 120px rgba(15,23,42,.12)";

        } else {

            navbar.style.transform =
                "translateX(-50%)";

            navbar.style.boxShadow =
                "0 20px 80px rgba(15,23,42,.08)";
        }
    });

    const reveals =
        document.querySelectorAll(".future-reveal");

    const observer =
        new IntersectionObserver((entries) => {

            entries.forEach((entry, index) => {

                if (entry.isIntersecting) {

                    entry.target.style.opacity = "1";

                    entry.target.style.transform =
                        "translateY(0px)";

                    entry.target.style.transition =
                        "all 1s cubic-bezier(.16,1,.3,1)";

                    entry.target.style.transitionDelay =
                        `${index * 120}ms`;

                    observer.unobserve(entry.target);
                }
            });

        }, {
            threshold: .12
        });

    reveals.forEach((el) => {
        observer.observe(el);
    });

});

/* =========================================================
   IMMERSIVE SCROLL STORYTELLING
========================================================= */

const cinematicSections =
    document.querySelectorAll(".cinematic-section");

window.addEventListener("scroll", () => {

    const scrollY =
        window.scrollY;

    cinematicSections.forEach((section, index) => {

        const speed =
            (index + 1) * .04;

        section.style.transform =
            `translateY(${scrollY * speed}px)`;
    });
});

/* =========================================================
   ORB PARALLAX
========================================================= */

const orbs =
    document.querySelectorAll(".future-orb");

window.addEventListener("mousemove", (e) => {

    const x =
        e.clientX / window.innerWidth;

    const y =
        e.clientY / window.innerHeight;

    orbs.forEach((orb, index) => {

        const intensity =
            (index + 1) * 18;

        orb.style.transform =
            `
            translate(
                ${x * intensity}px,
                ${y * intensity}px
            )
            `;
    });
});
/* =========================================================
   FUTURISTIC CURSOR
========================================================= */

const cursor =
    document.createElement("div");

cursor.className =
    "future-cursor";

document.body.appendChild(cursor);

const ring =
    document.createElement("div");

ring.className =
    "future-cursor-ring";

document.body.appendChild(ring);

window.addEventListener("mousemove", (e) => {

    cursor.style.left =
        e.clientX + "px";

    cursor.style.top =
        e.clientY + "px";

    ring.style.left =
        e.clientX + "px";

    ring.style.top =
        e.clientY + "px";
});

document.querySelectorAll("a, button").forEach((el) => {

    el.addEventListener("mouseenter", () => {

        ring.style.transform =
            "translate(-50%,-50%) scale(1.6)";

        ring.style.borderColor =
            "rgba(139,92,246,.7)";
    });

    el.addEventListener("mouseleave", () => {

        ring.style.transform =
            "translate(-50%,-50%) scale(1)";

        ring.style.borderColor =
            "rgba(56,189,248,.4)";
    });
});

/* =========================================================
   CINEMATIC LOADER
========================================================= */

const loader =
document.querySelector(".future-loader");

window.addEventListener("load", () => {

    setTimeout(() => {

        loader.classList.add("hidden");

    }, 1600);
});

/* =========================================================
   MAGNETIC UI
========================================================= */

document.querySelectorAll(".future-card, .btn-primary-light")
.forEach((element) => {

    element.addEventListener("mousemove", (e) => {

        const rect =
            element.getBoundingClientRect();

        const x =
            e.clientX - rect.left - rect.width / 2;

        const y =
            e.clientY - rect.top - rect.height / 2;

        element.style.transform =
            `
            translate(${x * 0.06}px, ${y * 0.06}px)
            translateY(-10px)
            `;
    });

    element.addEventListener("mouseleave", () => {

        element.style.transform =
            "";
    });
});