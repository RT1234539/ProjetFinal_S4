<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script>
tailwind.config = {
    darkMode: "class",
    theme: {
        extend: {
            "colors": {
                "primary": "#003f87",
                "on-primary": "#ffffff",
                "primary-container": "#0056b3",
                "on-primary-container": "#bbd0ff",
                "secondary": "#575f67",
                "on-secondary": "#ffffff",
                "secondary-container": "#d8e1ea",
                "on-secondary-container": "#5b646b",
                "tertiary": "#722b00",
                "on-tertiary": "#ffffff",
                "tertiary-container": "#983c00",
                "on-tertiary-container": "#ffc2a7",
                "tertiary-fixed": "#ffdbcc",
                "tertiary-fixed-dim": "#ffb694",
                "on-tertiary-fixed": "#351000",
                "on-tertiary-fixed-variant": "#7b2f00",
                "error": "#ba1a1a",
                "on-error": "#ffffff",
                "error-container": "#ffdad6",
                "on-error-container": "#93000a",
                "background": "#f8f9fa",
                "on-background": "#191c1d",
                "surface": "#f8f9fa",
                "on-surface": "#191c1d",
                "surface-variant": "#e1e3e4",
                "on-surface-variant": "#424752",
                "surface-bright": "#f8f9fa",
                "surface-dim": "#d9dadb",
                "surface-container": "#edeeef",
                "surface-container-low": "#f3f4f5",
                "surface-container-lowest": "#ffffff",
                "surface-container-high": "#e7e8e9",
                "surface-container-highest": "#e1e3e4",
                "surface-tint": "#115cb9",
                "outline": "#727784",
                "outline-variant": "#c2c6d4",
                "inverse-primary": "#acc7ff",
                "inverse-surface": "#2e3132",
                "inverse-on-surface": "#f0f1f2",
                "primary-fixed": "#d7e2ff",
                "primary-fixed-dim": "#acc7ff",
                "on-primary-fixed": "#001a40",
                "on-primary-fixed-variant": "#004491",
                "secondary-fixed": "#dbe4ed",
                "secondary-fixed-dim": "#bfc8d0",
                "on-secondary-fixed": "#141d23",
                "on-secondary-fixed-variant": "#3f484f"
            },
            "borderRadius": {
                "DEFAULT": "0.25rem",
                "lg": "0.5rem",
                "xl": "0.75rem",
                "full": "9999px"
            },
            "spacing": {
                "xl": "2rem",
                "gutter": "1.5rem",
                "margin-mobile": "1rem",
                "md": "1rem",
                "sm": "0.75rem",
                "base": "4px",
                "margin-desktop": "2rem",
                "lg": "1.5rem",
                "xs": "0.5rem"
            },
            "fontFamily": {
                "label-sm": ["Inter"],
                "body-md": ["Inter"],
                "label-md": ["Inter"],
                "headline-lg": ["Inter"],
                "headline-md": ["Inter"],
                "body-lg": ["Inter"],
                "headline-lg-mobile": ["Inter"],
                "body-sm": ["Inter"],
                "headline-sm": ["Inter"]
            },
            "fontSize": {
                "label-sm": ["12px", {"lineHeight": "1", "fontWeight": "500"}],
                "body-md": ["16px", {"lineHeight": "1.5", "fontWeight": "400"}],
                "label-md": ["14px", {"lineHeight": "1", "letterSpacing": "0.05em", "fontWeight": "600"}],
                "headline-lg": ["32px", {"lineHeight": "1.2", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                "headline-md": ["24px", {"lineHeight": "1.3", "letterSpacing": "-0.01em", "fontWeight": "600"}],
                "body-lg": ["18px", {"lineHeight": "1.6", "fontWeight": "400"}],
                "headline-lg-mobile": ["24px", {"lineHeight": "1.2", "fontWeight": "700"}],
                "body-sm": ["14px", {"lineHeight": "1.5", "fontWeight": "400"}],
                "headline-sm": ["20px", {"lineHeight": "1.4", "fontWeight": "600"}]
            }
        },
    },
}
</script>
<style>
body { font-family: 'Inter', sans-serif; background-color: #f8f9fa; }
.material-symbols-outlined {
    font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
}
.active-nav { font-variation-settings: 'FILL' 1; }
</style>
