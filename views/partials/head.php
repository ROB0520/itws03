<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
	<style type="text/tailwindcss">
		@theme inline {
			--color-background:      #FAFAFA;   			/* Background ng buong page */
			--color-foreground:    #000000;   			/* Regular na body text */
			--color-primary:       #3F51B5;   			/* Header at navigation bar */
			--color-accent:       #4CAF50;   			/* "Post a Job" button at mga highlight */
			--color-card:      #FFFFFF;   			/* Background ng mga card/box */
			--color-heading:      #000000;   			/* Kulay ng mga title at heading */
			--color-link:         #FFFFFF;   			/* Mga clickable na links */
			--color-tag:       #FFFFFF;   			/* Background ng mga tag/badge */
			--color-tag-foreground:     #000000;   			/* Text ng mga tag/badge */
			--color-footer:       #000000;   			/* Footer background */
			--font-heading: 'Libre Baskerville', serif;	/* Para sa mga title at heading */
			--font-body:    'Figtree', sans-serif;		/* Para sa regular na text */
			--radius: 0.5rem;							/* Border radius para sa mga card at buttons (Was originally in px, but I changed it to rem for better scalability) */

			/* Additional custom properties, for my preference */
			--color-border: #E3E7E8;
  			--color-input: #E3E7E8;
			--radius-sm: calc(var(--radius) * 0.6);
			--radius-md: calc(var(--radius) * 0.8);
			--radius-lg: var(--radius);
			--radius-xl: calc(var(--radius) * 1.4);
			--radius-2xl: calc(var(--radius) * 1.8);
			--radius-3xl: calc(var(--radius) * 2.2);
			--radius-4xl: calc(var(--radius) * 2.6);
		}

		@layer base {
			* {
				@apply border-border;
			}

			body {
				@apply bg-background text-foreground font-body;
			}

			h1,
			h2,
			h3,
			h4,
			h5,
			h6 {
				@apply font-heading;
			}

			a {
				@apply text-link;
			}

			header {
				@apply bg-primary text-white;
			}
		}
    </style>
	<style>
		.showcase-overlay {
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			z-index: 1;
			background-color: rgba(0, 0, 0, 0.5);
		}

		.showcase {
			background-image: url('/images/showcase.jpg');
		}
	</style>
	<title>Jobseeker</title>
</head>

<body class="bg-background">