<!DOCTYPE html><html class="light" lang="id" style=""><head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&amp;family=Sora:wght@300;400;600&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "surface-container-high": "#efe7da",
                        "surface-container": "#f5eddf",
                        "glass-border": "rgba(255, 255, 255, 0.45)",
                        "tertiary-fixed-dim": "#b4c5ff",
                        "primary-fixed": "#ffe088",
                        "tertiary-container": "#97b0ff",
                        "text-primary": "#1A1A1A",
                        "gold-hover": "#F6D365",
                        "on-primary-container": "#554300",
                        "on-surface-variant": "#4d4635",
                        "inverse-surface": "#343027",
                        "surface-container-lowest": "#ffffff",
                        "surface-luxury": "#F7F9FC",
                        "on-error-container": "#93000a",
                        "on-error": "#ffffff",
                        "on-primary": "#ffffff",
                        "error-container": "#ffdad6",
                        "on-primary-fixed": "#241a00",
                        "inverse-on-surface": "#f8f0e2",
                        "surface-variant": "#eae1d4",
                        "surface": "#fff8f0",
                        "outline-variant": "#d0c5af",
                        "secondary-fixed": "#d5e3ff",
                        "secondary-container": "#6da7fe",
                        "on-background": "#1f1b13",
                        "tertiary": "#415ba4",
                        "secondary": "#105eb0",
                        "surface-dim": "#e1d9cc",
                        "surface-container-highest": "#eae1d4",
                        "on-tertiary-fixed-variant": "#27438a",
                        "on-secondary-fixed": "#001b3c",
                        "gold-glow": "rgba(212, 175, 55, 0.35)",
                        "secondary-fixed-dim": "#a8c8ff",
                        "on-secondary-fixed-variant": "#00468a",
                        "on-primary-fixed-variant": "#574500",
                        "surface-tint": "#735c00",
                        "on-surface": "#1f1b13",
                        "primary-container": "#d4af37",
                        "on-tertiary": "#ffffff",
                        "tertiary-fixed": "#dbe1ff",
                        "text-secondary": "#5F6673",
                        "outline": "#7f7663",
                        "aurora-gradient": "linear-gradient(135deg, rgba(110, 168, 255, 0.15), rgba(212, 175, 55, 0.10), rgba(255, 255, 255, 0.35))",
                        "primary-fixed-dim": "#e9c349",
                        "on-tertiary-fixed": "#00174b",
                        "surface-container-low": "#fbf3e5",
                        "on-secondary": "#ffffff",
                        "inverse-primary": "#e9c349",
                        "surface-bright": "#fff8f0",
                        "background": "#fff8f0",
                        "on-secondary-container": "#003b75",
                        "error": "#ba1a1a",
                        "on-tertiary-container": "#254188",
                        "primary": "#735c00"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "nav-height-mobile": "72px",
                        "section-margin": "40px",
                        "nav-height-desktop": "88px",
                        "element-gap": "12px",
                        "container-padding": "2rem",
                        "dropdown-padding": "18px"
                    },
                    "fontFamily": {
                        "nav-menu": ["Outfit"],
                        "button-label": ["Sora"],
                        "nav-active": ["Outfit"],
                        "logo-title": ["Outfit"],
                        "body-md": ["Outfit"],
                        "logo-subtitle": ["Sora"],
                        "display-lg": ["Outfit"]
                    },
                    "fontSize": {
                        "nav-menu": ["16px", {"lineHeight": "24px", "letterSpacing": "0.01em", "fontWeight": "500"}],
                        "button-label": ["14px", {"lineHeight": "20px", "letterSpacing": "0.02em", "fontWeight": "600"}],
                        "nav-active": ["16px", {"lineHeight": "24px", "fontWeight": "600"}],
                        "logo-title": ["20px", {"lineHeight": "1.2", "fontWeight": "700"}],
                        "body-md": ["16px", {"lineHeight": "1.6", "fontWeight": "400"}],
                        "logo-subtitle": ["10px", {"lineHeight": "12px", "letterSpacing": "0.1em", "fontWeight": "400"}],
                        "display-lg": ["48px", {"lineHeight": "1.2", "letterSpacing": "-0.02em", "fontWeight": "700"}]
                    }
                }
            }
        }
    </script>
<style class="">.aurora-blur { background: linear-gradient(135deg, rgba(110, 168, 255, 0.12), rgba(212, 175, 55, 0.08), rgba(255, 255, 255, 0.4)); filter: blur(80px); } .glass-card { background: rgba(255, 255, 255, 0.72); backdrop-filter: blur(28px); border: 1px solid rgba(255, 255, 255, 0.45); } .gold-gradient-btn { background: #000000; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3); }</style>
<style class="">*, ::before, ::after{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-gradient-from-position: ;--tw-gradient-via-position: ;--tw-gradient-to-position: ;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: ;--tw-contain-size: ;--tw-contain-layout: ;--tw-contain-paint: ;--tw-contain-style: }::backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-gradient-from-position: ;--tw-gradient-via-position: ;--tw-gradient-to-position: ;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: ;--tw-contain-size: ;--tw-contain-layout: ;--tw-contain-paint: ;--tw-contain-style: }/* ! tailwindcss v3.4.17 | MIT License | https://tailwindcss.com */*,::after,::before{box-sizing:border-box;border-width:0;border-style:solid;border-color:#e5e7eb}::after,::before{--tw-content:''}:host,html{line-height:1.5;-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;font-family:ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";font-feature-settings:normal;font-variation-settings:normal;-webkit-tap-highlight-color:transparent}body{margin:0;line-height:inherit}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,pre,samp{font-family:ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;font-feature-settings:normal;font-variation-settings:normal;font-size:1em}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}button,input,optgroup,select,textarea{font-family:inherit;font-feature-settings:inherit;font-variation-settings:inherit;font-size:100%;font-weight:inherit;line-height:inherit;letter-spacing:inherit;color:inherit;margin:0;padding:0}button,select{text-transform:none}button,input:where([type=button]),input:where([type=reset]),input:where([type=submit]){-webkit-appearance:button;background-color:transparent;background-image:none}:-moz-focusring{outline:auto}:-moz-ui-invalid{box-shadow:none}progress{vertical-align:baseline}::-webkit-inner-spin-button,::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}blockquote,dd,dl,figure,h1,h2,h3,h4,h5,h6,hr,p,pre{margin:0}fieldset{margin:0;padding:0}legend{padding:0}menu,ol,ul{list-style:none;margin:0;padding:0}dialog{padding:0}textarea{resize:vertical}input::placeholder,textarea::placeholder{opacity:1;color:#9ca3af}[role=button],button{cursor:pointer}:disabled{cursor:default}audio,canvas,embed,iframe,img,object,svg,video{display:block;vertical-align:middle}img,video{max-width:100%;height:auto}[hidden]:where(:not([hidden=until-found])){display:none}[type='text'],input:where(:not([type])),[type='email'],[type='url'],[type='password'],[type='number'],[type='date'],[type='datetime-local'],[type='month'],[type='search'],[type='tel'],[type='time'],[type='week'],[multiple],textarea,select{-webkit-appearance:none;appearance:none;background-color:#fff;border-color:#6b7280;border-width:1px;border-radius:0px;padding-top:0.5rem;padding-right:0.75rem;padding-bottom:0.5rem;padding-left:0.75rem;font-size:1rem;line-height:1.5rem;--tw-shadow:0 0 #0000;}[type='text']:focus, input:where(:not([type])):focus, [type='email']:focus, [type='url']:focus, [type='password']:focus, [type='number']:focus, [type='date']:focus, [type='datetime-local']:focus, [type='month']:focus, [type='search']:focus, [type='tel']:focus, [type='time']:focus, [type='week']:focus, [multiple]:focus, textarea:focus, select:focus{outline:2px solid transparent;outline-offset:2px;--tw-ring-inset:var(--tw-empty,/*!*/ /*!*/);--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:#2563eb;--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow);border-color:#2563eb}input::placeholder,textarea::placeholder{color:#6b7280;opacity:1}::-webkit-datetime-edit-fields-wrapper{padding:0}::-webkit-date-and-time-value{min-height:1.5em;text-align:inherit}::-webkit-datetime-edit{display:inline-flex}::-webkit-datetime-edit,::-webkit-datetime-edit-year-field,::-webkit-datetime-edit-month-field,::-webkit-datetime-edit-day-field,::-webkit-datetime-edit-hour-field,::-webkit-datetime-edit-minute-field,::-webkit-datetime-edit-second-field,::-webkit-datetime-edit-millisecond-field,::-webkit-datetime-edit-meridiem-field{padding-top:0;padding-bottom:0}select{background-image:url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");background-position:right 0.5rem center;background-repeat:no-repeat;background-size:1.5em 1.5em;padding-right:2.5rem;print-color-adjust:exact}[multiple],[size]:where(select:not([size="1"])){background-image:initial;background-position:initial;background-repeat:unset;background-size:initial;padding-right:0.75rem;print-color-adjust:unset}[type='checkbox'],[type='radio']{-webkit-appearance:none;appearance:none;padding:0;print-color-adjust:exact;display:inline-block;vertical-align:middle;background-origin:border-box;-webkit-user-select:none;user-select:none;flex-shrink:0;height:1rem;width:1rem;color:#2563eb;background-color:#fff;border-color:#6b7280;border-width:1px;--tw-shadow:0 0 #0000}[type='checkbox']{border-radius:0px}[type='radio']{border-radius:100%}[type='checkbox']:focus,[type='radio']:focus{outline:2px solid transparent;outline-offset:2px;--tw-ring-inset:var(--tw-empty,/*!*/ /*!*/);--tw-ring-offset-width:2px;--tw-ring-offset-color:#fff;--tw-ring-color:#2563eb;--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow)}[type='checkbox']:checked,[type='radio']:checked{border-color:transparent;background-color:currentColor;background-size:100% 100%;background-position:center;background-repeat:no-repeat}[type='checkbox']:checked{background-image:url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3cpath d='M12.207 4.793a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0l-2-2a1 1 0 011.414-1.414L6.5 9.086l4.293-4.293a1 1 0 011.414 0z'/%3e%3c/svg%3e");}@media (forced-colors: active) {[type='checkbox']:checked{-webkit-appearance:auto;appearance:auto}}[type='radio']:checked{background-image:url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3ccircle cx='8' cy='8' r='3'/%3e%3c/svg%3e");}@media (forced-colors: active) {[type='radio']:checked{-webkit-appearance:auto;appearance:auto}}[type='checkbox']:checked:hover,[type='checkbox']:checked:focus,[type='radio']:checked:hover,[type='radio']:checked:focus{border-color:transparent;background-color:currentColor}[type='checkbox']:indeterminate{background-image:url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 16 16'%3e%3cpath stroke='white' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M4 8h8'/%3e%3c/svg%3e");border-color:transparent;background-color:currentColor;background-size:100% 100%;background-position:center;background-repeat:no-repeat;}@media (forced-colors: active) {[type='checkbox']:indeterminate{-webkit-appearance:auto;appearance:auto}}[type='checkbox']:indeterminate:hover,[type='checkbox']:indeterminate:focus{border-color:transparent;background-color:currentColor}[type='file']{background:unset;border-color:inherit;border-width:0;border-radius:0;padding:0;font-size:unset;line-height:inherit}[type='file']:focus{outline:1px solid ButtonText;outline:1px auto -webkit-focus-ring-color}.container{width:100%}@media (min-width: 640px){.container{max-width:640px}}@media (min-width: 768px){.container{max-width:768px}}@media (min-width: 1024px){.container{max-width:1024px}}@media (min-width: 1280px){.container{max-width:1280px}}@media (min-width: 1536px){.container{max-width:1536px}}.pointer-events-none{pointer-events:none}.fixed{position:fixed}.absolute{position:absolute}.relative{position:relative}.sticky{position:sticky}.inset-0{inset:0px}.-left-1\/4{left:-25%}.-right-1\/4{right:-25%}.-right-20{right:-5rem}.-top-1\/4{top:-25%}.-top-20{top:-5rem}.bottom-12{bottom:3rem}.bottom-6{bottom:1.5rem}.left-1\/2{left:50%}.left-6{left:1.5rem}.right-12{right:3rem}.top-1\/2{top:50%}.top-4{top:1rem}.-z-10{z-index:-10}.z-0{z-index:0}.z-10{z-index:10}.z-20{z-index:20}.z-\[100\]{z-index:100}.mx-auto{margin-left:auto;margin-right:auto}.mb-12{margin-bottom:3rem}.mb-16{margin-bottom:4rem}.mb-2{margin-bottom:0.5rem}.mb-3{margin-bottom:0.75rem}.mb-4{margin-bottom:1rem}.mb-6{margin-bottom:1.5rem}.mb-8{margin-bottom:2rem}.mb-section-margin{margin-bottom:40px}.mt-0{margin-top:0px}.mt-section-margin{margin-top:40px}.flex{display:flex}.inline-flex{display:inline-flex}.grid{display:grid}.hidden{display:none}.h-10{height:2.5rem}.h-14{height:3.5rem}.h-20{height:5rem}.h-64{height:16rem}.h-80{height:20rem}.h-\[1024px\]{height:1024px}.h-\[600px\]{height:600px}.h-\[800px\]{height:800px}.h-full{height:100%}.h-nav-height-desktop{height:88px}.min-h-\[800px\]{min-height:800px}.w-10{width:2.5rem}.w-14{width:3.5rem}.w-20{width:5rem}.w-80{width:20rem}.w-\[1000px\]{width:1000px}.w-\[600px\]{width:600px}.w-\[800px\]{width:800px}.w-full{width:100%}.max-w-2xl{max-width:42rem}.max-w-3xl{max-width:48rem}.max-w-5xl{max-width:64rem}.max-w-7xl{max-width:80rem}.max-w-\[220px\]{max-width:220px}.max-w-\[95\%\]{max-width:95%}.max-w-xl{max-width:36rem}.max-w-xs{max-width:20rem}.-translate-x-1\/2{--tw-translate-x:-50%;transform:translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}.-translate-y-1\/2{--tw-translate-y:-50%;transform:translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}.scale-95{--tw-scale-x:.95;--tw-scale-y:.95;transform:translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}.transform{transform:translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}.cursor-pointer{cursor:pointer}.cursor-text{cursor:text}.grid-cols-1{grid-template-columns:repeat(1, minmax(0, 1fr))}.flex-col{flex-direction:column}.flex-wrap{flex-wrap:wrap}.items-end{align-items:flex-end}.items-center{align-items:center}.justify-center{justify-content:center}.justify-between{justify-content:space-between}.gap-2{gap:0.5rem}.gap-3{gap:0.75rem}.gap-4{gap:1rem}.gap-6{gap:1.5rem}.gap-8{gap:2rem}.space-y-10 > :not([hidden]) ~ :not([hidden]){--tw-space-y-reverse:0;margin-top:calc(2.5rem * calc(1 - var(--tw-space-y-reverse)));margin-bottom:calc(2.5rem * var(--tw-space-y-reverse))}.space-y-4 > :not([hidden]) ~ :not([hidden]){--tw-space-y-reverse:0;margin-top:calc(1rem * calc(1 - var(--tw-space-y-reverse)));margin-bottom:calc(1rem * var(--tw-space-y-reverse))}.space-y-8 > :not([hidden]) ~ :not([hidden]){--tw-space-y-reverse:0;margin-top:calc(2rem * calc(1 - var(--tw-space-y-reverse)));margin-bottom:calc(2rem * var(--tw-space-y-reverse))}.overflow-hidden{overflow:hidden}.overflow-x-hidden{overflow-x:hidden}.rounded-2xl{border-radius:1rem}.rounded-3xl{border-radius:1.5rem}.rounded-\[32px\]{border-radius:32px}.rounded-\[40px\]{border-radius:40px}.rounded-\[48px\]{border-radius:48px}.rounded-\[50\%\]{border-radius:50%}.rounded-full{border-radius:9999px}.rounded-t-\[40px\]{border-top-left-radius:40px;border-top-right-radius:40px}.border{border-width:1px}.border-2{border-width:2px}.border-b-2{border-bottom-width:2px}.border-t{border-top-width:1px}.border-glass-border{border-color:rgba(255, 255, 255, 0.45)}.border-gold-glow\/20{border-color:rgba(212, 175, 55, 0.2)}.border-primary{--tw-border-opacity:1;border-color:rgb(115 92 0 / var(--tw-border-opacity, 1))}.border-primary\/20{border-color:rgb(115 92 0 / 0.2)}.border-primary\/30{border-color:rgb(115 92 0 / 0.3)}.border-white\/20{border-color:rgb(255 255 255 / 0.2)}.border-white\/30{border-color:rgb(255 255 255 / 0.3)}.border-white\/50{border-color:rgb(255 255 255 / 0.5)}.border-primary-container\/40{border-color:rgb(212 175 55 / 0.4)}.bg-surface-luxury{--tw-bg-opacity:1;background-color:rgb(247 249 252 / var(--tw-bg-opacity, 1))}.bg-black\/40{background-color:rgb(0 0 0 / 0.4)}.bg-primary-container{--tw-bg-opacity:1;background-color:rgb(212 175 55 / var(--tw-bg-opacity, 1))}.bg-primary\/10{background-color:rgb(115 92 0 / 0.1)}.bg-primary\/20{background-color:rgb(115 92 0 / 0.2)}.bg-primary\/5{background-color:rgb(115 92 0 / 0.05)}.bg-primary\/80{background-color:rgb(115 92 0 / 0.8)}.bg-secondary\/5{background-color:rgb(16 94 176 / 0.05)}.bg-secondary\/80{background-color:rgb(16 94 176 / 0.8)}.bg-surface-container-high{--tw-bg-opacity:1;background-color:rgb(239 231 218 / var(--tw-bg-opacity, 1))}.bg-surface-container-low\/40{background-color:rgb(251 243 229 / 0.4)}.bg-white{--tw-bg-opacity:1;background-color:rgb(255 255 255 / var(--tw-bg-opacity, 1))}.bg-black\/10{background-color:rgb(0 0 0 / 0.1)}.bg-gradient-to-b{background-image:linear-gradient(to bottom, var(--tw-gradient-stops))}.bg-gradient-to-t{background-image:linear-gradient(to top, var(--tw-gradient-stops))}.from-black\/20{--tw-gradient-from:rgb(0 0 0 / 0.2) var(--tw-gradient-from-position);--tw-gradient-to:rgb(0 0 0 / 0) var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from), var(--tw-gradient-to)}.from-black\/60{--tw-gradient-from:rgb(0 0 0 / 0.6) var(--tw-gradient-from-position);--tw-gradient-to:rgb(0 0 0 / 0) var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from), var(--tw-gradient-to)}.via-transparent{--tw-gradient-to:rgb(0 0 0 / 0)  var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from), transparent var(--tw-gradient-via-position), var(--tw-gradient-to)}.to-surface-luxury{--tw-gradient-to:#F7F9FC var(--tw-gradient-to-position)}.to-transparent{--tw-gradient-to:transparent var(--tw-gradient-to-position)}.object-cover{object-fit:cover}.p-1{padding:0.25rem}.p-12{padding:3rem}.p-6{padding:1.5rem}.p-8{padding:2rem}.px-10{padding-left:2.5rem;padding-right:2.5rem}.px-12{padding-left:3rem;padding-right:3rem}.px-3{padding-left:0.75rem;padding-right:0.75rem}.px-4{padding-left:1rem;padding-right:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.px-8{padding-left:2rem;padding-right:2rem}.px-container-padding{padding-left:2rem;padding-right:2rem}.py-1{padding-top:0.25rem;padding-bottom:0.25rem}.py-1\.5{padding-top:0.375rem;padding-bottom:0.375rem}.py-12{padding-top:3rem;padding-bottom:3rem}.py-2\.5{padding-top:0.625rem;padding-bottom:0.625rem}.py-20{padding-top:5rem;padding-bottom:5rem}.py-24{padding-top:6rem;padding-bottom:6rem}.py-32{padding-top:8rem;padding-bottom:8rem}.py-5{padding-top:1.25rem;padding-bottom:1.25rem}.py-6{padding-top:1.5rem;padding-bottom:1.5rem}.pb-1{padding-bottom:0.25rem}.pt-4{padding-top:1rem}.text-center{text-align:center}.font-body-md{font-family:Outfit}.font-button-label{font-family:Sora}.font-display-lg{font-family:Outfit}.font-logo-subtitle{font-family:Sora}.font-logo-title{font-family:Outfit}.font-nav-active{font-family:Outfit}.font-nav-menu{font-family:Outfit}.text-2xl{font-size:1.5rem;line-height:2rem}.text-3xl{font-size:1.875rem;line-height:2.25rem}.text-4xl{font-size:2.25rem;line-height:2.5rem}.text-5xl{font-size:3rem;line-height:1}.text-6xl{font-size:3.75rem;line-height:1}.text-\[10px\]{font-size:10px}.text-\[12px\]{font-size:12px}.text-\[24px\]{font-size:24px}.text-body-md{font-size:16px;line-height:1.6;font-weight:400}.text-button-label{font-size:14px;line-height:20px;letter-spacing:0.02em;font-weight:600}.text-lg{font-size:1.125rem;line-height:1.75rem}.text-logo-subtitle{font-size:10px;line-height:12px;letter-spacing:0.1em;font-weight:400}.text-logo-title{font-size:20px;line-height:1.2;font-weight:700}.text-nav-menu{font-size:16px;line-height:24px;letter-spacing:0.01em;font-weight:500}.text-sm{font-size:0.875rem;line-height:1.25rem}.text-xl{font-size:1.25rem;line-height:1.75rem}.text-xs{font-size:0.75rem;line-height:1rem}.font-bold{font-weight:700}.uppercase{text-transform:uppercase}.italic{font-style:italic}.leading-relaxed{line-height:1.625}.leading-snug{line-height:1.375}.leading-tight{line-height:1.25}.tracking-\[0\.2em\]{letter-spacing:0.2em}.tracking-wider{letter-spacing:0.05em}.tracking-widest{letter-spacing:0.1em}.text-on-surface{--tw-text-opacity:1;color:rgb(31 27 19 / var(--tw-text-opacity, 1))}.text-on-primary-container{--tw-text-opacity:1;color:rgb(85 67 0 / var(--tw-text-opacity, 1))}.text-on-primary-fixed{--tw-text-opacity:1;color:rgb(36 26 0 / var(--tw-text-opacity, 1))}.text-on-surface-variant{--tw-text-opacity:1;color:rgb(77 70 53 / var(--tw-text-opacity, 1))}.text-primary{--tw-text-opacity:1;color:rgb(115 92 0 / var(--tw-text-opacity, 1))}.text-primary-fixed{--tw-text-opacity:1;color:rgb(255 224 136 / var(--tw-text-opacity, 1))}.text-primary\/70{color:rgb(115 92 0 / 0.7)}.text-secondary{--tw-text-opacity:1;color:rgb(16 94 176 / var(--tw-text-opacity, 1))}.text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity, 1))}.text-white\/80{color:rgb(255 255 255 / 0.8)}.text-white\/90{color:rgb(255 255 255 / 0.9)}.text-primary-fixed\/90{color:rgb(255 224 136 / 0.9)}.text-black{--tw-text-opacity:1;color:rgb(0 0 0 / var(--tw-text-opacity, 1))}.decoration-2{text-decoration-thickness:2px}.underline-offset-4{text-underline-offset:4px}.underline-offset-8{text-underline-offset:8px}.opacity-20{opacity:0.2}.opacity-30{opacity:0.3}.opacity-40{opacity:0.4}.shadow-2xl{--tw-shadow:0 25px 50px -12px rgb(0 0 0 / 0.25);--tw-shadow-colored:0 25px 50px -12px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.shadow-lg{--tw-shadow:0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);--tw-shadow-colored:0 10px 15px -3px var(--tw-shadow-color), 0 4px 6px -4px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.shadow-sm{--tw-shadow:0 1px 2px 0 rgb(0 0 0 / 0.05);--tw-shadow-colored:0 1px 2px 0 var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.shadow-xl{--tw-shadow:0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);--tw-shadow-colored:0 20px 25px -5px var(--tw-shadow-color), 0 8px 10px -6px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.shadow-\[0_0_20px_rgba\(212\2c 175\2c 55\2c 0\.15\)\]{--tw-shadow:0 0 20px rgba(212,175,55,0.15);--tw-shadow-colored:0 0 20px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.shadow-black\/5{--tw-shadow-color:rgb(0 0 0 / 0.05);--tw-shadow:var(--tw-shadow-colored)}.ring-2{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)}.ring-primary-container\/20{--tw-ring-color:rgb(212 175 55 / 0.2)}.blur-\[80px\]{--tw-blur:blur(80px);filter:var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)}.drop-shadow-2xl{--tw-drop-shadow:drop-shadow(0 25px 25px rgb(0 0 0 / 0.15));filter:var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)}.drop-shadow-md{--tw-drop-shadow:drop-shadow(0 4px 3px rgb(0 0 0 / 0.07)) drop-shadow(0 2px 2px rgb(0 0 0 / 0.06));filter:var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)}.backdrop-blur-2xl{--tw-backdrop-blur:blur(40px);-webkit-backdrop-filter:var(--tw-backdrop-blur) var(--tw-backdrop-brightness) var(--tw-backdrop-contrast) var(--tw-backdrop-grayscale) var(--tw-backdrop-hue-rotate) var(--tw-backdrop-invert) var(--tw-backdrop-opacity) var(--tw-backdrop-saturate) var(--tw-backdrop-sepia);backdrop-filter:var(--tw-backdrop-blur) var(--tw-backdrop-brightness) var(--tw-backdrop-contrast) var(--tw-backdrop-grayscale) var(--tw-backdrop-hue-rotate) var(--tw-backdrop-invert) var(--tw-backdrop-opacity) var(--tw-backdrop-saturate) var(--tw-backdrop-sepia)}.backdrop-blur-\[2px\]{--tw-backdrop-blur:blur(2px);-webkit-backdrop-filter:var(--tw-backdrop-blur) var(--tw-backdrop-brightness) var(--tw-backdrop-contrast) var(--tw-backdrop-grayscale) var(--tw-backdrop-hue-rotate) var(--tw-backdrop-invert) var(--tw-backdrop-opacity) var(--tw-backdrop-saturate) var(--tw-backdrop-sepia);backdrop-filter:var(--tw-backdrop-blur) var(--tw-backdrop-brightness) var(--tw-backdrop-contrast) var(--tw-backdrop-grayscale) var(--tw-backdrop-hue-rotate) var(--tw-backdrop-invert) var(--tw-backdrop-opacity) var(--tw-backdrop-saturate) var(--tw-backdrop-sepia)}.backdrop-blur-md{--tw-backdrop-blur:blur(12px);-webkit-backdrop-filter:var(--tw-backdrop-blur) var(--tw-backdrop-brightness) var(--tw-backdrop-contrast) var(--tw-backdrop-grayscale) var(--tw-backdrop-hue-rotate) var(--tw-backdrop-invert) var(--tw-backdrop-opacity) var(--tw-backdrop-saturate) var(--tw-backdrop-sepia);backdrop-filter:var(--tw-backdrop-blur) var(--tw-backdrop-brightness) var(--tw-backdrop-contrast) var(--tw-backdrop-grayscale) var(--tw-backdrop-hue-rotate) var(--tw-backdrop-invert) var(--tw-backdrop-opacity) var(--tw-backdrop-saturate) var(--tw-backdrop-sepia)}.transition-all{transition-property:all;transition-timing-function:cubic-bezier(0.4, 0, 0.2, 1);transition-duration:150ms}.transition-colors{transition-property:color, background-color, border-color, fill, stroke, -webkit-text-decoration-color;transition-property:color, background-color, border-color, text-decoration-color, fill, stroke;transition-property:color, background-color, border-color, text-decoration-color, fill, stroke, -webkit-text-decoration-color;transition-timing-function:cubic-bezier(0.4, 0, 0.2, 1);transition-duration:150ms}.transition-transform{transition-property:transform;transition-timing-function:cubic-bezier(0.4, 0, 0.2, 1);transition-duration:150ms}.duration-200{transition-duration:200ms}.duration-300{transition-duration:300ms}.duration-500{transition-duration:500ms}.duration-700{transition-duration:700ms}.hover\:-translate-y-2:hover{--tw-translate-y:-0.5rem;transform:translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}.hover\:scale-105:hover{--tw-scale-x:1.05;--tw-scale-y:1.05;transform:translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}.hover\:bg-white:hover{--tw-bg-opacity:1;background-color:rgb(255 255 255 / var(--tw-bg-opacity, 1))}.hover\:bg-white\/10:hover{background-color:rgb(255 255 255 / 0.1)}.hover\:text-primary:hover{--tw-text-opacity:1;color:rgb(115 92 0 / var(--tw-text-opacity, 1))}.hover\:underline:hover{-webkit-text-decoration-line:underline;text-decoration-line:underline}.hover\:shadow-2xl:hover{--tw-shadow:0 25px 50px -12px rgb(0 0 0 / 0.25);--tw-shadow-colored:0 25px 50px -12px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.hover\:shadow-md:hover{--tw-shadow:0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);--tw-shadow-colored:0 4px 6px -1px var(--tw-shadow-color), 0 2px 4px -2px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.hover\:shadow-primary\/10:hover{--tw-shadow-color:rgb(115 92 0 / 0.1);--tw-shadow:var(--tw-shadow-colored)}.active\:scale-90:active{--tw-scale-x:.9;--tw-scale-y:.9;transform:translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}.group:hover .group-hover\:translate-x-1{--tw-translate-x:0.25rem;transform:translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}.group:hover .group-hover\:scale-110{--tw-scale-x:1.1;--tw-scale-y:1.1;transform:translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}.group:hover .group-hover\:bg-primary{--tw-bg-opacity:1;background-color:rgb(115 92 0 / var(--tw-bg-opacity, 1))}.group:hover .group-hover\:bg-secondary{--tw-bg-opacity:1;background-color:rgb(16 94 176 / var(--tw-bg-opacity, 1))}.group:hover .group-hover\:text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity, 1))}.dark\:border-outline-variant:is(.dark *){--tw-border-opacity:1;border-color:rgb(208 197 175 / var(--tw-border-opacity, 1))}.dark\:bg-surface-container-lowest:is(.dark *){--tw-bg-opacity:1;background-color:rgb(255 255 255 / var(--tw-bg-opacity, 1))}.dark\:shadow-none:is(.dark *){--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}@media (min-width: 768px){.md\:mb-0{margin-bottom:0px}.md\:block{display:block}.md\:flex{display:flex}.md\:grid-cols-3{grid-template-columns:repeat(3, minmax(0, 1fr))}.md\:grid-cols-4{grid-template-columns:repeat(4, minmax(0, 1fr))}.md\:flex-row{flex-direction:row}.md\:p-20{padding:5rem}.md\:text-4xl{font-size:2.25rem;line-height:2.5rem}.md\:text-5xl{font-size:3rem;line-height:1}.md\:text-7xl{font-size:4.5rem;line-height:1}}</style></head>
<body class="bg-surface-luxury text-on-surface font-body-md overflow-x-hidden">
<!-- Floating Aurora Gradients for Background Depth -->
<div class="fixed inset-0 pointer-events-none -z-10 overflow-hidden">
<div class="aurora-blur absolute -top-1/4 -right-1/4 w-[800px] h-[800px] rounded-full opacity-40"></div>
<div class="aurora-blur absolute top-1/2 -left-1/4 w-[600px] h-[600px] rounded-full opacity-30"></div>
</div>
<!-- Navigation Bar (Shared Component Strategy) -->
<nav class="rounded-full mx-auto max-w-[95%] sticky top-4 bg-white/72 dark:bg-surface-container/72 backdrop-blur-2xl border border-glass-border dark:border-outline-variant shadow-xl shadow-black/5 dark:shadow-none z-[100] flex justify-between items-center w-full px-8 h-nav-height-desktop mt-0" style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(20px); border-color: rgba(255, 255, 255, 0.2);">
<div class="flex items-center gap-3">
<div class="flex flex-col">
<span class="font-logo-title text-logo-title text-primary">SD Muhammadiyah 01 Gentasari</span>
<span class="font-logo-subtitle text-logo-subtitle text-primary/70">ISLAMIC FUTURE SCHOOL</span>
</div>
</div>
<div class="hidden md:flex items-center gap-8">
<a class="text-primary font-nav-active border-b-2 border-primary pb-1 font-nav-menu text-nav-menu" href="#">Beranda</a>
<a class="text-on-surface-variant hover:text-primary transition-colors duration-300 font-nav-menu text-nav-menu" href="#">Profil</a>
<a class="text-on-surface-variant hover:text-primary transition-colors duration-300 font-nav-menu text-nav-menu" href="#">Media</a>
<a class="text-on-surface-variant hover:text-primary transition-colors duration-300 font-nav-menu text-nav-menu" href="#">Aktivitas</a>
<a class="text-on-surface-variant hover:text-primary transition-colors duration-300 font-nav-menu text-nav-menu" href="#">Kontak</a>
</div>
<button class="gold-gradient-btn text-on-primary-fixed px-6 py-2.5 rounded-full font-button-label text-button-label scale-95 active:scale-90 transition-transform duration-200" style="background: linear-gradient(135deg, #d4af37, #f6d365); box-shadow: 0 4px 15px rgba(212, 175, 55, 0.3); color: #241a00;">
            Daftar Sekarang
        </button>
</nav>
<!-- Hero Section -->
<section class="relative h-screen min-h-[800px] w-full flex items-center justify-center overflow-hidden">
<!-- Full Screen Background Image -->
<div class="absolute inset-0 z-0">
<img alt="Future Classroom" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDa2jpiQP_Y4-zcRgQ4EyxogedW0csHD3rHho6AlqtrxOLdRUmtZ1pUevginiplw_rDAQUNEJig0OnhUzsjI-sBkBWTXvE7czvcT7-Osjrv529wK5fN-EytteZabOVb-Kk52yAVYnOe96wvN5LMazMdooQbC49B8jjr7h4m7UG5G9x7FaKFaKI_iLfqiibpHzVchghqJa9gLjo8OsFEvd9Pb1OioJuHi13ERPssvdnd3GiHrJTffjGooN4RghJf7BOVWtHQfRMZiVw">
<div class="absolute inset-0 bg-black/40 backdrop-blur-[2px]"></div>
<div class="absolute inset-0 bg-gradient-to-b from-black/20 via-transparent to-surface-luxury"></div>
</div>
<!-- Content Overlay -->
<div class="relative z-10 container mx-auto px-container-padding text-center space-y-10">
<div class="inline-flex items-center px-4 py-1.5 rounded-full glass-card border-white/20 text-white font-button-label text-[12px] tracking-widest uppercase mb-4">
            Akar Tradisi, Sayap Inovasi
        </div>
<h1 class="font-display-lg text-5xl md:text-7xl text-white leading-tight drop-shadow-2xl">
            Membangun Generasi <br>
<span class="text-primary-fixed italic">Qur'ani &amp; Visioner</span>
</h1>
<p class="text-white/90 font-body-md text-xl max-w-2xl mx-auto leading-relaxed drop-shadow-md">
            Sekolah Dasar Muhammadiyah 01 Gentasari mengintegrasikan nilai-nilai keislaman fundamental dengan teknologi pendidikan mutakhir untuk mencetak pemimpin masa depan.
        </p>
<div class="flex flex-wrap justify-center gap-6 pt-4">
<button class="gold-gradient-btn text-on-primary-fixed px-10 py-5 rounded-full font-button-label text-lg flex items-center gap-2 group transition-all transform hover:scale-105" style="background: linear-gradient(135deg, rgb(212, 175, 55), rgb(246, 211, 101)); box-shadow: rgba(212, 175, 55, 0.3) 0px 4px 15px; color: rgb(36, 26, 0);">
                Daftar Sekarang
                <span class="material-symbols-outlined text-[24px] group-hover:translate-x-1 transition-transform" data-icon="arrow_forward">arrow_forward</span>
</button>
<button class="glass-card border-white/30 px-10 py-5 rounded-full font-button-label text-lg flex items-center gap-2 hover:bg-white/10 transition-all text-on-surface">
<span class="material-symbols-outlined text-[24px]" data-icon="play_circle">play_circle</span>
                Tur Virtual Sekolah
            </button>
</div>
</div>
<!-- Floating Accreditation Badge (Relocated) -->

</section>
<!-- Quick Stats / Features Bento Grid -->
<section class="py-20 px-container-padding max-w-7xl mx-auto">
<div class="text-center mb-16 space-y-4">
<h2 class="font-display-lg text-4xl text-on-surface">Pilar Keunggulan Kami</h2>
<p class="text-on-surface-variant max-w-2xl mx-auto">Filosofi pendidikan yang menyeimbangkan kecerdasan spiritual, emosional, dan intelektual dalam ekosistem digital.</p>
</div>
<div class="grid grid-cols-1 md:grid-cols-4 gap-6">
<!-- Feature Card 1 -->
<div class="glass-card p-8 rounded-[32px] group hover:-translate-y-2 transition-all duration-500 border-gold-glow/20">
<div class="w-14 h-14 rounded-2xl bg-primary/5 flex items-center justify-center text-primary mb-6 group-hover:bg-primary group-hover:text-white transition-colors">
<span class="material-symbols-outlined text-3xl" data-icon="public">public</span>
</div>
<h3 class="font-nav-active text-xl text-on-surface mb-3">Kurikulum Internasional</h3>
<p class="text-on-surface-variant text-sm leading-relaxed">Adaptasi kurikulum global yang dipadukan dengan kearifan lokal Al-Islam Kemuhammadiyahan.</p>
</div>
<!-- Feature Card 2 -->
<div class="glass-card p-8 rounded-[32px] group hover:-translate-y-2 transition-all duration-500 border-gold-glow/20">
<div class="w-14 h-14 rounded-2xl bg-secondary/5 flex items-center justify-center text-secondary mb-6 group-hover:bg-secondary group-hover:text-white transition-colors">
<span class="material-symbols-outlined text-3xl" data-icon="school">school</span>
</div>
<h3 class="font-nav-active text-xl text-on-surface mb-3">Fasilitas Modern</h3>
<p class="text-on-surface-variant text-sm leading-relaxed">Laboratorium teknologi, ruang kelas multimedia, dan sarana ibadah yang representatif.</p>
</div>
<!-- Feature Card 3 -->
<div class="glass-card p-8 rounded-[32px] group hover:-translate-y-2 transition-all duration-500 border-gold-glow/20">
<div class="w-14 h-14 rounded-2xl bg-primary/5 flex items-center justify-center text-primary mb-6 group-hover:bg-primary group-hover:text-white transition-colors">
<span class="material-symbols-outlined text-3xl" data-icon="auto_awesome">auto_awesome</span>
</div>
<h3 class="font-nav-active text-xl text-on-surface mb-3">Pembiasaan Islami</h3>
<p class="text-on-surface-variant text-sm leading-relaxed">Integrasi karakter Qur'ani dalam setiap aspek aktivitas harian peserta didik.</p>
</div>
<!-- Feature Card 4 -->
<div class="glass-card p-8 rounded-[32px] group hover:-translate-y-2 transition-all duration-500 border-gold-glow/20">
<div class="w-14 h-14 rounded-2xl bg-secondary/5 flex items-center justify-center text-secondary mb-6 group-hover:bg-secondary group-hover:text-white transition-colors">
<span class="material-symbols-outlined text-3xl" data-icon="workspace_premium">workspace_premium</span>
</div>
<h3 class="font-nav-active text-xl text-on-surface mb-3">Prestasi Global</h3>
<p class="text-on-surface-variant text-sm leading-relaxed">Rekam jejak capaian akademik dan non-akademik di tingkat nasional hingga internasional.</p>
</div>
</div>
</section>
<!-- Academic Excellence / Program -->
<section class="py-24 bg-surface-container-low/40 relative">
<div class="px-container-padding max-w-7xl mx-auto">
<div class="flex flex-col md:flex-row justify-between items-end gap-8 mb-16">
<div class="max-w-2xl space-y-4">
<span class="text-primary font-bold tracking-[0.2em] text-xs uppercase">Program Unggulan</span>
<h2 class="font-display-lg text-4xl text-on-surface leading-tight">Mempersiapkan Pemimpin dalam Ekosistem Digital Berbasis Wahyu</h2>
</div>
<button class="text-primary font-button-label flex items-center gap-2 group underline-offset-8 hover:underline decoration-2">
                    Lihat Semua Program
                    <span class="material-symbols-outlined" data-icon="arrow_right_alt">arrow_right_alt</span>
</button>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
<!-- Program 1 -->
<div class="group relative bg-white rounded-[40px] overflow-hidden shadow-xl shadow-black/5 hover:shadow-2xl hover:shadow-primary/10 transition-all duration-500 border border-white/50">
<div class="h-64 overflow-hidden relative">
<img alt="Tahfidz Digital" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" data-alt="A close-up shot of a young student wearing a white cap, focusing intently on a digital Quran app on a high-resolution tablet. The background shows a serene, modern Islamic prayer hall with geometric wooden patterns and soft warm lighting. The mood is spiritual yet technologically advanced, reflecting the integration of tradition and innovation. Bright, luxury light-mode aesthetic." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBHko21n5GokTFdv_ijiQSwywLEwEzkieQcuOgFPrC4qre9oNFrBlqLJ7WPaDrRcOdnMt6uJU-CQ_5nRfE986W43ULCofvZW_fvsEsORhvgtjptVnQh13LRu39pM4zb7UomO0v4mfyYP4maAkJxsDpJtzbjsqgpytyGfTd5gYxGBrc4AfheCGhOtAWYgTwDVsL3CyFvKpWLrv8UMxE5z9FYE20f20Sr2TrNYoZAjJXhIcpTLdhiGRldo7bLbnP6zu333OVVSMPtvOU">
<div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
<div class="absolute bottom-6 left-6 text-white">
<span class="px-3 py-1 rounded-full bg-primary/80 backdrop-blur-md text-[10px] uppercase font-bold tracking-wider">Tahfidz Quran</span>
</div>
</div>
<div class="p-8 space-y-4">
<h4 class="font-display-lg text-2xl text-on-surface">Tahfidz Quran Digital</h4>
<p class="text-on-surface-variant text-sm">Metode menghafal Al-Quran yang didukung dengan aplikasi pelacakan progress interaktif dan mutabaah harian online.</p>
</div>
</div>
<!-- Program 2 -->
<div class="group relative bg-white rounded-[40px] overflow-hidden shadow-xl shadow-black/5 hover:shadow-2xl hover:shadow-primary/10 transition-all duration-500 border border-white/50">
<div class="h-64 overflow-hidden relative">
<img alt="STEM Lab" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" data-alt="A bright, high-tech school science laboratory where students are collaborating on a robotics project. The room is filled with clean white benches, organized equipment, and glowing blue LED accents. Professional, futuristic educational setting with high-end photographic quality. Bright natural light pouring in from large windows, creating a pristine and inspiring atmosphere for learning." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDudjcMDZgJv0lT2pGcjSaE9Aqeqt8Sbed2C32HzB-YtoaWdm4-CRuCJ-t_i4FoUdJpsV9B3ESQoM7JNOWxmuE594IVL1MUHg56yFMZ3zitU_7JDbOLickeG88xHTqSgdBFwsOwdlrbUhYqlLTfZCKFQJrxhaORpAXgtcux1yVWdBP1DrgIBq7eE4NWJZfwOZwXxlxh-QlcCa30ywYZUKLBDa6Y8gxH9YMwodbxxJ00lV_6_iUjc6IQbvkTh3lm9iOV5WMk40asa2s">
<div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
<div class="absolute bottom-6 left-6 text-white">
<span class="px-3 py-1 rounded-full bg-secondary/80 backdrop-blur-md text-[10px] uppercase font-bold tracking-wider">Inovasi STEM</span>
</div>
</div>
<div class="p-8 space-y-4">
<h4 class="font-display-lg text-2xl text-on-surface">STEM Learning Lab</h4>
<p class="text-on-surface-variant text-sm">Pembelajaran Science, Technology, Engineering, dan Math yang menekankan pada problem solving dan kreativitas aplikatif.</p>
</div>
</div>
<!-- Program 3 -->
<div class="group relative bg-white rounded-[40px] overflow-hidden shadow-xl shadow-black/5 hover:shadow-2xl hover:shadow-primary/10 transition-all duration-500 border border-white/50">
<div class="h-64 overflow-hidden relative">
<img alt="Bilingual Class" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" data-alt="A multicultural elementary classroom where students and a teacher are engaged in an animated English language lesson. Colorful educational posters in English and Indonesian adorn the glass-paneled walls. The lighting is soft and airy, creating a high-end educational vibe. Everyone is smiling and active, representing a vibrant and inclusive learning environment. Modern, minimalist furniture in light wood tones." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBaanP-znSXql8Et5IMHWoOI7AcQMhAo9-4jD7JWCvaiyJvtPU3F6txtQCjsJg9MN28sPXDxTK67OdCG1UJ8TNpybi8cYr3miO27W-e_vP0DH4AiGZQ-SLSqypSiZaWkIlGQ_EUnk1ReEJVX9wQeuvr_2qUB2ZX7yy5oZiYR1sZekSazl0SFeeIKXg6vw5lGHJsJxgUHhI7XqoP7EbiAW0ZdfFb7RdIY8XVE556mUf4VzShXD60-hYMsTYpxqh9ncH69_Ij975-JHY">
<div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
<div class="absolute bottom-6 left-6 text-white">
<span class="px-3 py-1 rounded-full bg-primary-container backdrop-blur-md text-[10px] uppercase font-bold tracking-wider text-on-primary-container">Bilingual</span>
</div>
</div>
<div class="p-8 space-y-4">
<h4 class="font-display-lg text-2xl text-on-surface">Bilingual Classroom</h4>
<p class="text-on-surface-variant text-sm">Pengantar pembelajaran dalam Bahasa Inggris dan Bahasa Indonesia untuk membiasakan komunikasi internasional sejak dini.</p>
</div>
</div>
</div>
</div>
</section>
<!-- Testimonials / Quote Section -->
<section class="py-32 relative overflow-hidden">
<div class="aurora-blur absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[1000px] h-[600px] rounded-[50%] opacity-20 pointer-events-none"></div>
<div class="px-container-padding max-w-5xl mx-auto text-center relative z-10">
<span class="material-symbols-outlined text-primary text-6xl mb-8 opacity-40" data-icon="format_quote" data-weight="fill">format_quote</span>
<blockquote class="font-display-lg text-3xl md:text-4xl text-on-surface leading-snug mb-12 italic">
                "Visi kami bukan sekadar mendidik otak yang cerdas, melainkan membentuk jiwa yang kokoh berlandaskan Al-Quran untuk menghadapi dunia yang terus bertransformasi secara digital."
            </blockquote>
<div class="flex flex-col items-center">
<div class="w-20 h-20 rounded-full border-2 border-primary/30 p-1 mb-4">
<img alt="Principal" class="w-full h-full object-cover rounded-full" data-alt="A professional portrait of a distinguished male educator in his 50s, wearing a clean, modern suit with a subtle traditional motif. He has a warm, confident expression and is posed against a softly blurred background of a modern academic library. The lighting is studio-quality, emphasizing trust and visionary leadership. Bright and clean luxury aesthetic." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDjQjnNrGJVHjZjjmG6tg7q5IWCVID5FAkLzfifmDpbpu-pGRoExOY3O8SgKwWjiVXSMwkBEZDhwn7DaWik1iHqZL8h4frc8kWriyAhqiNl574KODxqO8dbyJgEKxUl6bDSwIXzTo1-AEPRSvIKOPgOMZkPafhZ4sYdOaF3Eb8K0_soT6B2DJw6r16lmLQpPscTMmB6Jq9YYWaCKQ8uZN9qu0Hu7592dhAnreQtlyAIL-tuSei6kle2cWOKFAcdfbxjAAVfwN4CWLs">
</div>
<h5 class="font-bold text-on-surface text-lg">H. Ahmad Fauzi, M.Pd.</h5>
<p class="text-primary font-button-label text-sm uppercase tracking-widest">Kepala Sekolah SDM 01 Gentasari</p>
</div>
</div>
</section>
<!-- CTA Section -->
<section class="mb-section-margin px-container-padding max-w-7xl mx-auto">
<div class="glass-card rounded-[48px] p-12 md:p-20 text-center relative overflow-hidden">
<div class="absolute -top-20 -right-20 w-80 h-80 bg-primary/10 rounded-full blur-[80px]"></div>
<div class="relative z-10 space-y-8">
<h2 class="font-display-lg text-4xl md:text-5xl text-on-surface max-w-3xl mx-auto leading-tight">
                    Mulai Perjalanan Masa Depan <br> Buah Hati Anda Hari Ini
                </h2>
<p class="text-on-surface-variant font-body-md text-lg max-w-xl mx-auto">
                    Penerimaan Peserta Didik Baru (PPDB) Tahun Pelajaran 2024/2025 telah dibuka. Kuota terbatas untuk memastikan kualitas pendampingan personal.
                </p>
<div class="flex flex-wrap justify-center gap-6">
<button class="gold-gradient-btn text-on-primary-fixed px-12 py-5 rounded-full font-button-label text-lg shadow-lg hover:scale-105 transition-all">
                        Daftar Online Sekarang
                    </button>
<button class="glass-card border-primary/20 text-primary px-12 py-5 rounded-full font-button-label text-lg hover:bg-white transition-all">
                        Unduh Brosur (PDF)
                    </button>
</div>
</div>
</div>
</section>
<!-- Footer (Shared Component Strategy) -->
<footer class="w-full rounded-t-[40px] mt-section-margin bg-surface-container-high dark:bg-surface-container-lowest">
<div class="flex flex-col md:flex-row justify-between items-center w-full px-container-padding py-12 max-w-7xl mx-auto">
<div class="flex flex-col gap-4 mb-8 md:mb-0">
<div class="flex flex-col">
<span class="font-logo-title text-logo-title text-primary">SD Muhammadiyah 01 Gentasari</span>
<span class="font-logo-subtitle text-logo-subtitle text-primary/70">Islamic Future School</span>
</div>
<p class="font-body-md text-body-md text-on-surface-variant max-w-xs">
                    Jl. Gentasari No. 01, Kroya, Cilacap. <br> Mencetak Generasi Islam yang Unggul &amp; Berkemajuan.
                </p>
</div>
<div class="flex flex-col md:flex-row gap-8 items-center">
<div class="flex gap-6">
<a class="text-on-surface-variant hover:text-primary transition-all underline-offset-4 hover:underline font-body-md text-body-md" href="#">Kebijakan Privasi</a>
<a class="text-on-surface-variant hover:text-primary transition-all underline-offset-4 hover:underline font-body-md text-body-md" href="#">Syarat &amp; Ketentuan</a>
<a class="text-on-surface-variant hover:text-primary transition-all underline-offset-4 hover:underline font-body-md text-body-md" href="#">Peta Situs</a>
</div>
<div class="flex gap-4">
<a class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-primary shadow-sm hover:shadow-md transition-all" href="#">
<span class="material-symbols-outlined" data-icon="facebook">social_leaderboard</span>
</a>
<a class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-primary shadow-sm hover:shadow-md transition-all" href="#">
<span class="material-symbols-outlined" data-icon="language">language</span>
</a>
<a class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-primary shadow-sm hover:shadow-md transition-all" href="#">
<span class="material-symbols-outlined" data-icon="smart_display">smart_display</span>
</a>
</div>
</div>
</div>
<div class="w-full py-6 border-t border-glass-border flex justify-center items-center text-on-surface-variant font-body-md text-sm">
            © 2024 SD Muhammadiyah 01 Gentasari. Islamic Future School.
        </div>
</footer>


</body></html>