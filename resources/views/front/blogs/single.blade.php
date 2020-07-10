@extends('layouts.front.app')

@section('og')
	<meta property="og:type" content="blog"/>
	<meta property="og:title" content="{{ config('app.name') }}"/>
	<meta property="og:description" content="{{ config('app.name') }}"/>
@endsection

@section('css')
	<style type="text/css">
		.img-fluid {
			max-width: 100%;
			height: auto;
		}

		.post-entry-1 .post-entry-1-contents {
			background: #fff;
			padding: 20px;
		}

		img {
			vertical-align: middle;
			border-style: none;
		}

		::selection {
			background: #000;
			color: #fff;
		}

		body {
			line-height: 1.7;
			color: #364d59 !important;
			font-weight: 300;
			font-size: 1rem;
		}

		div {
			display: block;
		}
		.img-fluid {
			max-width: 100%;
			height: 150px;
		}
		.et_pb_top_inside_divider {
			background-image: url(data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDBweCIgdmlld0JveD0iMCAwIDEyODAgODYiIHByZXNlcnZlQXNwZWN0UmF0aW89InhNaWRZTWlkIHNsaWNlIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxnIGZpbGw9IiMwMTcwYmYiPjxwYXRoIGQ9Ik04MzMuOSAyNy41Yy01LjggMy4yLTExIDcuMy0xNS41IDEyLjItNy4xLTYuOS0xNy41LTguOC0yNi42LTUtMzAuNi0zOS4yLTg3LjMtNDYuMS0xMjYuNS0xNS41LTEuNCAxLjEtMi44IDIuMi00LjEgMy40QzY3NC40IDMzLjQgNjg0IDQ4IDY4OC44IDY0LjNjNC43LjYgOS4zIDEuOCAxMy42IDMuOCA3LjgtMjQuNyAzNC4yLTM4LjMgNTguOS0zMC41IDE0LjQgNC42IDI1LjYgMTUuNyAzMC4zIDMwIDE0LjIgMS4yIDI3LjcgNi45IDM4LjUgMTYuMkM4NDAuNiA0OS42IDg3NiAyOS41IDkxMC44IDM4Yy0yMC40LTIwLjMtNTEuOC0yNC42LTc2LjktMTAuNXpNMzg0IDQzLjljLTkgNS0xNi43IDExLjktMjIuNyAyMC4zIDE1LjQtNy44IDMzLjMtOC43IDQ5LjQtMi42IDMuNy0xMC4xIDkuOS0xOS4xIDE4LjEtMjYtMTUuNC0yLjMtMzEuMi42LTQ0LjggOC4zem01NjAuMiAxMy42YzIgMi4yIDMuOSA0LjUgNS43IDYuOSA1LjYtMi42IDExLjYtNCAxNy44LTQuMS03LjYtMi40LTE1LjYtMy4zLTIzLjUtMi44ek0xNzguNyA3YzI5LTQuMiA1Ny4zIDEwLjggNzAuMyAzNyA4LjktOC4zIDIwLjctMTIuOCAzMi45LTEyLjVDMjU2LjQgMS44IDIxNC43LTguMSAxNzguNyA3em0xNDYuNSA1Ni4zYzEuNSA0LjUgMi40IDkuMiAyLjUgMTQgLjQuMi44LjQgMS4yLjcgMy4zIDEuOSA2LjMgNC4yIDguOSA2LjkgNS44LTguNyAxMy43LTE1LjcgMjIuOS0yMC41LTExLjEtNS4yLTIzLjktNS42LTM1LjUtMS4xek0zMy41IDU0LjljMjEuNi0xNC40IDUwLjctOC41IDY1IDEzIC4xLjIuMi4zLjMuNSA3LjMtMS4yIDE0LjgtLjYgMjEuOCAxLjYuNi0xMC4zIDMuNS0yMC40IDguNi0yOS40LjMtLjYuNy0xLjIgMS4xLTEuOC0zMi4xLTE3LjItNzEuOS0xMC42LTk2LjggMTYuMXptMTIyOC45IDIuN2MyLjMgMi45IDQuNCA1LjkgNi4yIDkuMSAzLjgtLjUgNy42LS44IDExLjQtLjhWNDguM2MtNi40IDEuOC0xMi40IDUtMTcuNiA5LjN6TTExMjcuMyAxMWMxLjkuOSAzLjcgMS44IDUuNiAyLjggMTQuMiA3LjkgMjUuOCAxOS43IDMzLjUgMzQgMTMuOS0xMS40IDMxLjctMTYuOSA0OS42LTE1LjMtMjAuNS0yNy43LTU3LjgtMzYuOC04OC43LTIxLjV6IiBmaWxsLW9wYWNpdHk9Ii41Ii8+PHBhdGggZD0iTTAgMHY2NmM2LjggMCAxMy41LjkgMjAuMSAyLjYgMy41LTUuNCA4LjEtMTAuMSAxMy40LTEzLjYgMjQuOS0yNi44IDY0LjctMzMuNCA5Ni44LTE2IDEwLjUtMTcuNCAyOC4yLTI5LjEgNDguMy0zMiAzNi4xLTE1LjEgNzcuNy01LjIgMTAzLjIgMjQuNSAxOS43LjQgMzcuMSAxMy4xIDQzLjQgMzEuOCAxMS41LTQuNSAyNC40LTQuMiAzNS42IDEuMWwuNC0uMmMxNS40LTIxLjQgNDEuNS0zMi40IDY3LjYtMjguNiAyNS0yMSA2Mi4xLTE4LjggODQuNCA1LjEgNi43LTYuNiAxNi43LTguNCAyNS40LTQuOCAyOS4yLTM3LjQgODMuMy00NC4xIDEyMC43LTE0LjhsMS44IDEuNWMzNy4zLTMyLjkgOTQuMy0yOS4zIDEyNy4yIDggMS4yIDEuMyAyLjMgMi43IDMuNCA0LjEgOS4xLTMuOCAxOS41LTEuOSAyNi42IDUgMjQuMy0yNiA2NS0yNy4zIDkxLTMuMS41LjUgMSAuOSAxLjUgMS40IDEyLjggMy4xIDI0LjQgOS45IDMzLjQgMTkuNSA3LjktLjUgMTUuOS40IDIzLjUgMi44IDctLjEgMTMuOSAxLjUgMjAuMSA0LjcgMy45LTExLjYgMTUuNS0xOC45IDI3LjctMTcuNS4yLS4zLjMtLjYuNS0uOSAyMi4xLTM5LjIgNzAuNy01NC43IDExMS40LTM1LjYgMzAuOC0xNS4zIDY4LjItNi4yIDg4LjYgMjEuNSAxOC4zIDEuNyAzNSAxMC44IDQ2LjUgMjUuMSA1LjItNC4zIDExLjEtNy40IDE3LjYtOS4zVjBIMHoiLz48L2c+PC9zdmc+);
			background-size: cover;
			background-position: center top;
			top: 0;
			height: 100px;
			z-index: 1;
		}
		.et_pb_bottom_inside_divider {
			background-image: url(data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwJSIgdmlld0JveD0iMCAwIDEyODAgODYiIHByZXNlcnZlQXNwZWN0UmF0aW89InhNaWRZTWlkIHNsaWNlIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxnIGZpbGw9IiMwMTcwYmYiPjxwYXRoIGQ9Ik0xMjgwIDY2LjFjLTMuOCAwLTcuNi4zLTExLjQuOC0xOC4zLTMyLjYtNTkuNi00NC4yLTkyLjItMjUuOS0zLjUgMi02LjkgNC4zLTEwIDYuOS0yMi43LTQxLjctNzQuOS01Ny4yLTExNi42LTM0LjUtMTQuMiA3LjctMjUuOSAxOS4zLTMzLjggMzMuMy0uMi4zLS4zLjYtLjUuOC0xMi4yLTEuNC0yMy43IDUuOS0yNy43IDE3LjUtMTEuOS02LjEtMjUuOS02LjMtMzcuOS0uNi0yMS43LTMwLjQtNjQtMzcuNS05NC40LTE1LjctMTIuMSA4LjYtMjEgMjEtMjUuNCAzNS4yLTEwLjgtOS4zLTI0LjMtMTUtMzguNS0xNi4yLTguMS0yNC42LTM0LjYtMzgtNTkuMi0yOS45LTE0LjMgNC43LTI1LjUgMTYtMzAgMzAuMy00LjMtMS45LTguOS0zLjItMTMuNi0zLjgtMTMuNi00NS41LTYxLjUtNzEuNC0xMDctNTcuOGE4Ni4zOCA4Ni4zOCAwIDAgMC00My4yIDI5LjRjLTguNy0zLjYtMTguNy0xLjgtMjUuNCA0LjgtMjMuMS0yNC44LTYxLjktMjYuMi04Ni43LTMuMS03LjEgNi42LTEyLjUgMTQuOC0xNS45IDI0LTI2LjctMTAuMS01Ni45LS40LTcyLjggMjMuMy0yLjYtMi43LTUuNi01LjEtOC45LTYuOS0uNC0uMi0uOC0uNC0xLjItLjctLjYtMjUuOS0yMi00Ni40LTQ3LjktNDUuOC0xMS41LjMtMjIuNSA0LjctMzAuOSAxMi41LTE2LjUtMzMuNS01Ny4xLTQ3LjMtOTAuNi0zMC44LTIxLjkgMTEtMzYuMyAzMi43LTM3LjYgNTcuMS03LTIuMy0xNC41LTIuOC0yMS44LTEuNkM4NC44IDQ3IDU1LjcgNDAuNyAzNCA1NC44Yy01LjYgMy42LTEwLjMgOC40LTEzLjkgMTQtNi42LTEuNy0xMy4zLTIuNi0yMC4xLTIuNi0uMSAwIDAgMTkuOCAwIDE5LjhoMTI4MFY2Ni4xeiIgZmlsbC1vcGFjaXR5PSIuNSIvPjxwYXRoIGQ9Ik0xNS42IDg2SDEyODBWNDguNWMtMy42IDEuMS03LjEgMi41LTEwLjQgNC40LTYuMyAzLjYtMTEuOCA4LjUtMTYgMTQuNS04LjEtMS41LTE2LjQtLjktMjQuMiAxLjctMy4yLTM5LTM3LjMtNjguMS03Ni40LTY0LjktMjQuOCAyLTQ2LjggMTYuOS01Ny45IDM5LjMtMTkuOS0xOC41LTUxLTE3LjMtNjkuNCAyLjYtOC4yIDguOC0xMi44IDIwLjMtMTMuMSAzMi4zLS40LjItLjkuNC0xLjMuNy0zLjUgMS45LTYuNiA0LjQtOS40IDcuMi0xNi42LTI0LjktNDguMi0zNS03Ni4yLTI0LjQtMTIuMi0zMy40LTQ5LjEtNTAuNi04Mi41LTM4LjQtOS41IDMuNS0xOC4xIDkuMS0yNSAxNi41LTcuMS02LjktMTcuNS04LjgtMjYuNi01LTMwLjQtMzkuMy04Ny00Ni4zLTEyNi4yLTE1LjgtMTQuOCAxMS41LTI1LjYgMjcuNC0zMSA0NS40LTQuOS42LTkuNyAxLjktMTQuMiAzLjktOC4yLTI1LjktMzUuOC00MC4yLTYxLjctMzItMTUgNC44LTI2LjkgMTYuNS0zMS44IDMxLjUtMTQuOSAxLjMtMjkgNy4yLTQwLjMgMTctMTEuNS0zNy40LTUxLjItNTguNC04OC43LTQ2LjgtMTQuOCA0LjYtMjcuNyAxMy45LTM2LjcgMjYuNS0xMi42LTYtMjcuMy01LjctMzkuNy42LTQuMS0xMi4yLTE2LjItMTkuOC0yOS0xOC40LS4yLS4zLS4zLS42LS41LS45LTI0LjQtNDMuMy03OS40LTU4LjYtMTIyLjctMzQuMi0xMy4zIDcuNS0yNC40IDE4LjItMzIuNCAzMS4yQzk5LjggMTguNSA1MCAyOC41IDI1LjQgNjUuNGMtNC4zIDYuNC03LjUgMTMuMy05LjggMjAuNnoiLz48L2c+PC9zdmc+);
			background-size: cover;
			background-position: center top;
			bottom: 0;
			height: 10vw;
			z-index: 10;
		}
		.post-standard-details {
			margin-bottom: 80px; }
		.post-standard-details .post-thumb {
			box-shadow: 24px 50px 60px rgba(0, 0, 0, 0.3);
			margin-bottom: 60px;
			float: left; }
		.post-standard-details .post__content {
			margin-bottom: 30px; }
		.post-standard-details .post__content .post__text {
			margin-bottom: 30px; }
		.post-standard-details .post__content .post__title {
			text-transform: uppercase;
			margin-bottom: 30px; }
		.post-standard-details .post__content .post-additional-info {
			margin-bottom: 30px; }
		@media (max-width: 768px) {
			.post-standard-details .post__content .post-additional-info > span {
				display: block;
				margin-bottom: 10px; } }
		.post-standard-details .post__content .post-additional-info i {
			font-size: 20px;
			margin-right: 10px;
			transition: all .3s ease;
			color: #ccc; }
		.post-standard-details .post__content .post-additional-info .post__author {
			display: inline-block;
			margin-right: 30px; }
		@media (max-width: 768px) {
			.post-standard-details .post__content .post-additional-info .post__author {
				display: block;
				margin-bottom: 10px; } }
		.post-standard-details .post__content .post-additional-info .post__author img {
			margin-right: 10px; }
		.post-standard-details .post__content .post-additional-info .post__author .post__author-name {
			display: inline-block; }
		.post-standard-details .post__content .post-additional-info .post__date {
			padding: 0;
			float: none;
			margin-right: 30px;
			display: inline-block;
			margin-bottom: 0;
			background-color: transparent; }
		@media (max-width: 768px) {
			.post-standard-details .post__content .post-additional-info .post__date {
				margin-bottom: 10px; } }
		.post-standard-details .post__content .post-additional-info .category {
			margin-right: 30px; }
		.post-standard-details .post__content .post-additional-info .category a {
			color: #ccc;
			display: inline-block;
			font-size: 14px; }
		.post-standard-details .post__content .post-additional-info .category a:hover {
			color: #4cc2c0; }
		.post-standard-details .post__content .post-additional-info .post__comments {
			color: #ccc;
			font-size: 14px; }
		.post-standard-details .post__content .post-additional-info .post__comments a {
			color: #ccc;
			font-size: 14px; }
		.post-standard-details .post__content .post-additional-info .post__comments:hover {
			color: #4cc2c0; }
		.post-standard-details .post__content .post__subtitle {
			color: #2f2c2c;
			margin-bottom: 30px; }
		.post-standard-details .post__content .testimonial-item.quote-left {
			margin: 60px 0; }
		@media (max-width: 768px) {
			.post-standard-details .post__content .testimonial-item.quote-left {
				margin: 30px 0; } }
		.post-standard-details .post__content .list {
			margin-bottom: 30px; }
		.post-standard-details .post__content .w-tags {
			margin-bottom: 10px; }
		.post-standard-details .socials .social__item i {
			font-size: 20px;
			color: #d7d7d7;
			transition: all .3s ease; }
		.post-standard-details .socials .social__item:hover i {
			color: #08acee; }
		.post-standard-details .socials .social__item:first-child {
			margin-left: 15px; }
		.post-standard-details .socials button {
			background: none;
			cursor: pointer;
			margin-left: 0; }
		.post-standard-details .socials .label {
			position: relative;
			top: -10px; }

		/*------------- #POST --------------*/
		@media (max-width: 360px) {
			.post {
				margin-bottom: 30px; } }

		.post .post__date {
			background-color: #f7f9f9;
			display: block;
			float: left; }
		.post__content-info {
			color: #333333;
		font-size: 14px}
		.post .post__content {
			padding-bottom: 30px;
			border-bottom: 1px solid #f7f9f9;
			clear: both;
			margin-bottom: 30px; }
		.post .post__content .post__title {
			font-size: 24px;
			margin-bottom: 15px;
			line-height: 1.25; }
		@media (max-width: 800px) {
			.post .post__content .post__title {
				font-size: 20px; } }
		.post .post__content .post__title:hover {
			color: #4cc2c0; }
		.post .post__content .post__text {
			margin-bottom: 0; }
		.post .post__content .post__content-info .post-additional-info .category {
			font-size: 14px;
			color: #ccc; }
		@media (max-width: 360px) {
			.post .post__content .post__content-info .post-additional-info > span {
				display: block; } }
		.post .post__content .post__content-info .post-tags {
			padding-top: 30px; }

		.post .post__author {
			display: table;
			font-size: 14px;
			color: #ccc; }
		.post .post__author .post-avatar {
			float: left;
			display: table-cell;
			vertical-align: middle;
			margin-right: 15px; }
		.post .post__author .post__author-name {
			display: table-cell;
			vertical-align: middle; }
		.post .post__author .post__author-name a {
			display: block;
			line-height: 1;
			font-size: 14px;
			color: #2f2c2c; }
		@media (max-width: 480px) {
			.post .post__author .post__author-name a {
				white-space: nowrap; } }
		.post .post__author .post__author-name .post__author-link:hover {
			color: #4cc2c0; }

		.post__date {
			font-size: 14px;
			padding: 15px 25px;
			border-radius: 50px;
			margin-bottom: 20px;
			display: block;
			color: #ccc; }

		.post-standard {
			padding: 60px 30px 30px;
			background-color: #f7f9f9;
			position: relative;
			margin-bottom: 60px; }
		@media (max-width: 480px) {
			.post-standard {
				padding: 50px 15px 15px; } }
		@media (max-width: 480px) {
			.post-standard {
				margin-bottom: 30px; } }

		.blog-details-author {
			padding: 60px;
			background-color: #f7f9f9;
			margin-bottom: 60px; }
		.blog-details-author .blog-details-author-thumb {
			float: left;
			margin-right: 30px; }
		@media (max-width: 480px) {
			.blog-details-author .blog-details-author-thumb {
				float: none;
				margin-bottom: 30px; } }
		.blog-details-author .blog-details-author-content {
			overflow: hidden; }
		.blog-details-author .blog-details-author-content .author-info {
			margin-bottom: 0; }
		.blog-details-author .blog-details-author-content .author-info .author-name {
			display: inline-block;
			margin-right: 30px; }
		.blog-details-author .blog-details-author-content .author-info .author-info {
			display: inline-block;
			font-size: 14px; }
		.blog-details-author .blog-details-author-content .text {
			margin-bottom: 20px; }
		.blog-details-author .socials .social__item img {
			width: 20px;
			height: auto; }

		body.author .blog-details-author {
			margin-bottom: 30px; }

		.author .avatar {
			border-radius: 100%; }
		/*------------- #STUNNING-HEADER --------------*/
		.stunning-header {
			padding: 125px 0;
			background-position: center center; }
		@media (max-width: 768px) {
			.stunning-header {
				padding: 60px 0; } }
		.stunning-header .stunning-header-content {
			max-width: 800px;
			margin: 0 auto;
			text-align: center;
			position: relative;
			z-index: 5;
			padding: 0 15px; }
		.stunning-header .stunning-header-content .stunning-header-title {
			color: #000000; }
		@media (max-width: 800px) {
			.stunning-header .stunning-header-content .stunning-header-title {
				font-size: 40px; } }
		@media (max-width: 640px) {
			.stunning-header .stunning-header-content .stunning-header-title {
				font-size: 36px; } }
		@media (max-width: 480px) {
			.stunning-header .stunning-header-content .stunning-header-title {
				font-size: 30px; } }
		@media (max-width: 360px) {
			.stunning-header .stunning-header-content .stunning-header-title {
				font-size: 24px; } }
		.stunning-header .stunning-header-content .breadcrumbs {
			margin-top: 40px;
			padding: 0; }
		@media (max-width: 570px) {
			.stunning-header .stunning-header-content .breadcrumbs {
				font-size: 12px; } }
		.stunning-header .stunning-header-content .breadcrumbs .breadcrumbs-item {
			display: inline-block; }
		.stunning-header .stunning-header-content .breadcrumbs .breadcrumbs-item a {
			text-transform: uppercase;
			color: white;
			opacity: .5;
			margin-right: 20px; }
		.stunning-header .stunning-header-content .breadcrumbs .breadcrumbs-item a:hover {
			opacity: 1; }
		.stunning-header .stunning-header-content .breadcrumbs .breadcrumbs-item a.c-gray + i {
			color: #acacac; }
		.stunning-header .stunning-header-content .breadcrumbs .breadcrumbs-item.active span {
			color: white;
			opacity: 1;
			text-decoration: underline; }
		.stunning-header .stunning-header-content .breadcrumbs .breadcrumbs-item.active span.c-primary {
			color: #4cc2c0; }
		.stunning-header .stunning-header-content .breadcrumbs .breadcrumbs-item i {
			margin-right: 20px;
			color: rgba(255, 255, 255, 0.5);
			font-size: 14px; }
		.stunning-header .stunning-header-content .breadcrumbs .breadcrumbs-item:last-child i {
			display: none; }
		.stunning-header.with-photo {
			position: relative;
			padding: 280px 0 120px;
			background-size: cover; }

		.stunning-header-custom {
			color: #fff; }

		.stunning-header-custom .stunning-header-title,
		.stunning-header-custom span,
		.stunning-header-custom i,
		.stunning-header-custom a {
			color: inherit !important; }
		.w-tags {
			overflow: hidden; }
		.w-tags .heading {
			margin-bottom: 40px; }
		.w-tags .tags-wrap a {
			padding: 10px 15px;
			font-size: 15px;
			color: #acacac;
			border: 2px solid #dddede;
			border-radius: 50px;
			margin-right: 10px;
			margin-bottom: 10px;
			float: left;
			transition: all .3s ease; }
		@media (max-width: 1024px) {
			.w-tags .tags-wrap a {
				padding: 10px 20px; } }
		.w-tags .tags-wrap a:hover {
			background-color: #4cc2c0;
			color: #fff;
			border-color: #4cc2c0; }
		/*------------- #PAGINATION-ARROW --------------*/
		.pagination-arrow {
			padding: 100px 0 110px;
			position: relative;
			overflow: hidden;
			margin-bottom: 60px; }
		@media (max-width: 768px) {
			.pagination-arrow {
				padding: 40px 0 50px; } }
		.pagination-arrow .btn-prev-wrap {
			left: 5px;
			top: 50%;
			transform: translate(0, -50%);
			-webkit-transform: translate(0, -50%);
			-ms-transform: translate(0, -50%);
			display: flex;
			align-items: center;
			position: absolute; }
		.pagination-arrow .btn-prev-wrap .btn-prev {
			position: relative;
			margin-right: 35px; }
		.pagination-arrow .btn-prev-wrap .btn-prev:hover {
			margin-left: 0; }
		.pagination-arrow .btn-prev-wrap .btn-content {
			position: relative; }
		@media (max-width: 800px) {
			.pagination-arrow .btn-prev-wrap .btn-content {
				display: none; } }
		.pagination-arrow .btn-prev-wrap .btn-content .btn-content-title {
			text-transform: uppercase;
			font-size: 18px;
			color: #2f2c2c;
			transition: all .3s ease; }
		.pagination-arrow .btn-prev-wrap .btn-content .btn-content-subtitle {
			font-size: 14px;
			margin-bottom: 0;
			color: #acacac;
			transition: all .3s ease; }
		.pagination-arrow .btn-prev-wrap:hover {
			margin-left: -2px; }
		.pagination-arrow .btn-prev-wrap:hover .btn-content .btn-content-title {
			color: #4cc2c0; }
		.pagination-arrow .btn-prev-wrap:hover .btn-content .btn-content-subtitle {
			color: #2f2c2c; }
		.pagination-arrow .btn-prev-wrap:hover .btn-prev {
			fill: #4cc2c0; }
		.pagination-arrow .all-project {
			position: absolute;
			left: 50%;
			top: 50%;
			transform: translate(-50%, -50%);
			-webkit-transform: translate(-50%, -50%);
			-ms-transform: translate(-50%, -50%); }
		.pagination-arrow .all-project i {
			font-size: 50px;
			color: #d7d7d7;
			transition: all .3s ease; }
		.pagination-arrow .all-project:hover i {
			color: #4cc2c0; }
		.pagination-arrow .btn-next-wrap {
			right: 5px;
			top: 50%;
			transform: translate(0, -50%);
			-webkit-transform: translate(0, -50%);
			-ms-transform: translate(0, -50%);
			display: flex;
			align-items: center;
			position: absolute; }
		.pagination-arrow .btn-next-wrap .btn-next {
			position: relative; }
		.pagination-arrow .btn-next-wrap .btn-next:hover {
			margin-right: 0; }
		.pagination-arrow .btn-next-wrap .btn-content {
			position: relative;
			text-align: right;
			margin-right: 35px; }
		@media (max-width: 800px) {
			.pagination-arrow .btn-next-wrap .btn-content {
				display: none; } }
		.pagination-arrow .btn-next-wrap .btn-content .btn-content-title {
			text-transform: uppercase;
			font-size: 18px;
			color: #2f2c2c;
			transition: all .3s ease; }
		.pagination-arrow .btn-next-wrap .btn-content .btn-content-subtitle {
			font-size: 14px;
			margin-bottom: 0;
			color: #acacac;
			transition: all .3s ease; }
		.pagination-arrow .btn-next-wrap:hover {
			margin-right: -2px; }
		.pagination-arrow .btn-next-wrap:hover .btn-content .btn-content-title {
			color: #4cc2c0; }
		.pagination-arrow .btn-next-wrap:hover .btn-content .btn-content-subtitle {
			color: #2f2c2c; }
		.pagination-arrow .btn-next-wrap:hover .btn-next {
			fill: #4cc2c0; }
		.pagination-arrow span {
			display: block; }
		.blog-details-author {
			padding: 60px;
			background-color: #f7f9f9;
			margin-bottom: 60px; }
		.blog-details-author .blog-details-author-thumb {
			float: left;
			margin-right: 30px; }
		@media (max-width: 480px) {
			.blog-details-author .blog-details-author-thumb {
				float: none;
				margin-bottom: 30px; } }
		.blog-details-author .blog-details-author-content {
			overflow: hidden; }
		.blog-details-author .blog-details-author-content .author-info {
			margin-bottom: 0; }
		.blog-details-author .blog-details-author-content .author-info .author-name {
			display: inline-block;
			margin-right: 30px; }
		.blog-details-author .blog-details-author-content .author-info .author-info {
			display: inline-block;
			font-size: 14px; }
		.blog-details-author .blog-details-author-content .text {
			margin-bottom: 20px; }
		.blog-details-author .socials .social__item img {
			width: 20px;
			height: auto; }

		body.author .blog-details-author {
			margin-bottom: 30px; }

		.author .avatar {
			border-radius: 100%; }

	</style>
@endsection

@section('content')
	{{--@include('front.pages.blog-slider')--}}
	<div class="stunning-header stunning-header-bg-lightviolet">
		<div class="stunning-header-content">
			<h1 class="stunning-header-title">{{ $post->title }}</h1>
		</div>
	</div>


	<div class="container">
		<div class="row medium-padding120">
			<main class="main">
				<div class="col-lg-10 col-lg-offset-1">
					<article class="hentry post post-standard-details">

						<div class="post-thumb">
							<img height="300" width="900" src="{{ $post->featured }}" alt="{{ $post->title }}">
						</div>

						<div class="post__content">


							<div class="post-additional-info">

								{{-- <div class="post__author author vcard">
                                    Posted by

                                    <div class="post__author-name fn">
                                        <a href="#" class="post__author-link">admin</a>
                                    </div>

                                </div> --}}

								<span class="post__date">

                                <i class="seoicon-clock"></i>

                                <time class="published" datetime="2016-03-20 12:00:00">
                                    {{$post->created_at->toFormattedDateString() }}
                                </time>

                            </span>

								<span class="category">
                                <i class="seoicon-tags"></i>
                                <a href="{{ route('blog_category',['id'=>$post->category->id]) }}">{{ $post->category->name}}</a>

                            </span>

							</div>

							<div class="post__content-info">


								{!! $post->body !!}



								<div class="widget w-tags">
									<div class="tags-wrap">
										@foreach($post->tags as $tag)
											<a href="{{ route('blog_tag',['id'=>$tag->id]) }}" class="w-tags-item">{{$tag->tag}}</a>
										@endforeach
									</div>
								</div>

							</div>
						</div>

						<div class="socials text-center">Share:
							<!-- Go to www.addthis.com/dashboard to customize your tools --> <div class="addthis_inline_share_toolbox_jd8q"></div>
						</div>

					</article>

					<div class="blog-details-author">

						<div class="blog-details-author-thumb">
							<img height="50" width="90" src="{{ asset($post->employee->avatar) }}" alt="Author">
						</div>

						<div class="blog-details-author-content">
							<div class="author-info">
								<h5 class="author-name">{{$post->employee->name}}</h5>

							</div>
							<p class="text">{{$post->employee->about}}
							</p>
							<div class="socials">

								<a href="{{$post->employee->facebook}}" target="_blank" class="social__item">
									<img src="{{ asset('app/svg/circle-facebook.svg') }}" alt="facebook">
								</a>

								 <a href="#" class="social__item">
                                    <img src="{{ asset('app/svg/twitter.svg') }}" alt="twitter">
                                </a>

                                <a href="#" class="social__item">
                                    <img src="{{ asset('app/svg/google.svg') }}" alt="google">
                                </a>

								<a href="{{$post->employee->youtube}}" target="_blank" class="social__item">
									<img src="{{ asset('app/svg/youtube.svg') }}" alt="youtube">
								</a>

							</div>
						</div>
					</div>

					<div class="pagination-arrow">

						@if($prev)
							<a href="{{ route('post.single', ['slug' => $prev->slug ]) }}" class="btn-next-wrap">
								<div class="btn-content">
									<div class="btn-content-title">Next Post</div>
									<p class="btn-content-subtitle">{{ $prev->title }}</p>
								</div>
								<svg class="btn-next">
									<use xlink:href="#arrow-right"></use>
								</svg>
							</a>
						@endif

						@if($next)
							<a href="{{ route('post.single', ['slug' => $next->slug ]) }}" class="btn-prev-wrap">
								<svg class="btn-prev">
									<use xlink:href="#arrow-left"></use>
								</svg>
								<div class="btn-content">
									<div class="btn-content-title">Previous Post</div>
									<p class="btn-content-subtitle">{{ $next->title }}</p>
								</div>
							</a>
						@endif

					</div>


					<div class="comments">

						<div class="heading text-center">
							<h4 class="h1 heading-title">Comments</h4>
							<div class="heading-line">
								<span class="short-line"></span>
								<span class="long-line"></span>
							</div>
						</div>

					{{--	@include('front.blogs.disqus')--}}
					</div>

					<div class="row">

					</div>


				</div>

				<!-- End Post Details -->

				<!-- Sidebar-->

				<div class="col-lg-12">
					<aside aria-label="sidebar" class="sidebar sidebar-right">
						<div  class="widget w-tags">
							<div class="heading text-center">
								<h4 class="heading-title">ALL BLOG TAGS</h4>
								<div class="heading-line">
									<span class="short-line"></span>
									<span class="long-line"></span>
								</div>
							</div>

							<div class="tags-wrap">

								@foreach($post->tags as $tag)
									<a href="{{ route('blog_tag',['id'=>$tag->id]) }}" class="w-tags-item">{{$tag->tag}}</a>
								@endforeach

							</div>
						</div>
					</aside>
				</div>




				<!-- End Sidebar-->

			</main>
		</div>
	</div>
	<!-- form-->


	<section class="et_pb_bottom_inside_divider">

	</section>
@endsection

@section('js')
	<script type="text/javascript">
        $('#blog').addClass('active');
	</script>
@endsection