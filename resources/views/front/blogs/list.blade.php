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
		/*------------- #POST --------------*/
		@media (max-width: 360px) {
			.post {
				margin-bottom: 30px; } }

		.post .post__date {
			background-color: #f7f9f9;
			display: block;
			float: left; }

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
			color: #fff; }
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
		img {
			max-width: 100%;
			height: auto;
			display: inline-block;
			vertical-align: middle; }
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
		.post-standard.has-post-thumbnail {
			padding: 30px; }
		@media (max-width: 480px) {
			.post-standard.has-post-thumbnail {
				padding: 50px 15px 15px; } }
		.post-standard:hover .overlay {
			opacity: 1; }
		.post-standard:hover .post-thumb .link-image {
			opacity: 1;
			left: 50%; }
		.post-standard:hover .post-thumb .link-post {
			opacity: 1;
			right: 50%; }
		.post-standard .post-thumb {
			position: relative;
			margin-bottom: 60px;
			box-shadow: 24px 50px 60px rgba(0, 0, 0, 0.3);
			text-align: center; }
		@media (max-width: 480px) {
			.post-standard .post-thumb {
				margin-bottom: 40px; } }
		.post-standard .post-thumb .link-image {
			color: #fff;
			font-size: 36px;
			position: absolute;
			top: 50%;
			left: 0;
			transform: translate(75%, -50%);
			-webkit-transform: translate(75%, -50%);
			-ms-transform: translate(75%, -50%);
			opacity: 0;
			z-index: 50;
			transition: all .6s ease; }
		.post-standard .post-thumb .link-image:hover {
			color: #4cc2c0; }
		.post-standard .post-thumb .link-post {
			color: #fff;
			font-size: 36px;
			position: absolute;
			top: 50%;
			right: 0;
			transform: translate(-75%, -50%);
			-webkit-transform: translate(-75%, -50%);
			-ms-transform: translate(-75%, -50%);
			opacity: 0;
			z-index: 50;
			transition: all .6s ease; }
		.post-standard .post-thumb .link-post:hover {
			color: #4cc2c0; }
		.post-standard .post-thumb.custom-bg {
			background-size: cover;
			background-position: center; }
		.post-standard .post-thumb iframe {
			display: block;
			max-width: 100%; }
		.post-standard .post__content {
			padding-left: 15px;
			padding-bottom: 0;
			margin-bottom: 0; }
		.post-standard .post__content .post__author {
			margin-right: 40px;
			float: left;
			text-align: center; }
		@media (max-width: 480px) {
			.post-standard .post__content .post__author {
				float: none;
				margin-bottom: 20px;
				text-align: left; } }
		.post-standard .post__content .post__author img {
			margin: 0 auto;
			display: block;
			margin-bottom: 10px; }
		@media (max-width: 480px) {
			.post-standard .post__content .post__author img {
				float: left;
				margin-right: 20px; } }
		.post-standard .post__content .post__author .post__author-name {
			display: block; }
		.post-standard .post__content .post__content-info {
			overflow: hidden; }
		.post-standard .post__content .post__content-info .post__title {
			text-transform: uppercase; }
		.post-standard .post__content .post__content-info .post-additional-info {
			margin-bottom: 25px; }
		@media (max-width: 480px) {
			.post-standard .post__content .post__content-info .post-additional-info {
				margin-bottom: 15px; } }
		.post-standard .post__content .post__content-info .post-additional-info i {
			font-size: 20px;
			margin-right: 10px;
			transition: all .3s ease; }
		.post-standard .post__content .post__content-info .post-additional-info .post__date {
			padding: 0;
			float: none;
			margin-right: 30px;
			display: inline-block;
			margin-bottom: 0; }
		.post-standard .post__content .post__content-info .post-additional-info .category {
			margin-right: 30px; }
		.post-standard .post__content .post__content-info .post-additional-info .category a {
			color: #ccc;
			display: inline-block; }
		.post-standard .post__content .post__content-info .post-additional-info .category a:hover {
			color: #4cc2c0; }
		.post-standard .post__content .post__content-info .post-additional-info .post__comments {
			color: #ccc;
			font-size: 14px; }
		.post-standard .post__content .post__content-info .post-additional-info .post__comments a {
			color: #ccc; }
		.post-standard .post__content .post__content-info .post-additional-info .post__comments a:hover {
			color: #4cc2c0; }
		.post-standard .post__content .post__content-info .post__text {
			font-size: 16px;
			margin-bottom: 30px; }
		@media (max-width: 480px) {
			.post-standard .post__content .post__content-info .post__text {
				margin-bottom: 20px; } }
		.post-standard .post__content .post__content-info .btn {
			margin-bottom: 30px; }
		.post-standard .post__content .post__content-info .btn:hover {
			background-color: #4cc2c0; }
		.post-standard .post__content .post__content-info .post-tags {
			padding-top: 30px; }
		.post-standard .overlay {
			opacity: 0; }
		.post-standard.sticky:before {
			content: '\e952';
			font-family: "seosight";
			display: block;
			width: 50px;
			height: 50px;
			background-color: #f04e4e;
			line-height: 50px;
			text-align: center;
			color: #fff;
			font-size: 20px;
			position: absolute;
			top: -20px;
			left: 60px;
			z-index: 5; }
		.post-standard.video .overlay {
			opacity: 1; }
		.post-standard.video .play-video {
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			-webkit-transform: translate(-50%, -50%);
			-ms-transform: translate(-50%, -50%);
			z-index: 10; }
		.post-standard.slider:hover .post-thumb .overlay {
			opacity: 0; }
		.post-standard.slider .post-thumb {
			margin-bottom: 0; }
		.post-standard.slider .post-standard-thumb-slider {
			margin-bottom: 60px; }
		.post-standard.slider .pagination, .post-standard.slider .swiper-pagination {
			bottom: 40px;
			left: 50%;
			transform: translate(-50%, 0);
			-webkit-transform: translate(-50%, 0);
			-ms-transform: translate(-50%, 0); }
		.post-standard.quote .post-thumb {
			padding: 100px 120px;
			text-align: left; }
		@media (max-width: 1024px) {
			.post-standard.quote .post-thumb {
				padding: 30px; } }
		.post-standard.quote .post-thumb .testimonial-content {
			position: relative; }
		.post-standard.quote .post-thumb .testimonial-content .text {
			font-size: 24px;
			color: #fff;
			line-height: 1.4; }
		@media (max-width: 570px) {
			.post-standard.quote .post-thumb .testimonial-content .text {
				font-size: 18px; } }
		.post-standard.quote .post-thumb .testimonial-content .author-info-wrap .author-info .author-name {
			color: #4cc2c0; }
		.post-standard.quote .post-thumb .testimonial-content .quote {
			position: absolute;
			right: 0;
			bottom: -30px; }
		@media (max-width: 360px) {
			.post-standard.quote .post-thumb .testimonial-content .quote {
				display: none; } }
		.post-standard.quote .post-thumb .testimonial-content .quote i {
			font-size: 140px;
			color: #fcd846; }
		.post-standard.audio .post-thumb {
			height: auto;
			overflow: hidden; }
		@media (max-width: 360px) {
			.post-standard.audio .post-thumb {
				height: auto; } }
		.post-standard.audio .post-thumb .author-photo {
			position: relative;
			float: left;
			z-index: 5; }
		@media (max-width: 360px) {
			.post-standard.audio .post-thumb .author-photo {
				float: none; } }
		.post-standard.audio .post-thumb .author-photo .overlay-audio {
			position: absolute;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			background-color: rgba(43, 48, 68, 0.8); }
		.post-standard.audio .post-thumb .author-photo .play-audio {
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			-webkit-transform: translate(-50%, -50%);
			-ms-transform: translate(-50%, -50%); }
		.post-standard.audio .post-thumb .author-photo .play-audio i {
			font-size: 46px;
			color: #fff; }
		.post-standard.audio .post-thumb .audio-player {
			position: relative;
			padding: 40px;
			background-color: #31364c;
			margin-left: 165px;
			height: 100%; }
		@media (max-width: 360px) {
			.post-standard.audio .post-thumb .audio-player {
				margin-left: 0; } }
		.post-standard.audio .post-thumb .audio-player .composition-time {
			text-align: right;
			font-size: 12px;
			margin-bottom: 4px; }
		@media (max-width: 980px) {
			.post-standard.audio .post-thumb .audio-player .composition-time {
				text-align: left; } }
		@media (max-width: 768px) {
			.post-standard.audio .post-thumb .audio-player .composition-time {
				text-align: right; } }
		.post-standard.audio .post-thumb .audio-player .composition-time .time-over {
			color: #4cc2c0;
			margin-right: 20px; }
		.post-standard.audio .post-thumb .audio-player .composition-time .time-total {
			color: #6b7186; }
		.post-standard.audio .post-thumb .audio-player .play-meter {
			width: 100%;
			border-radius: 10px;
			background-color: #3d4359;
			position: relative;
			height: 8px; }
		.post-standard.audio .post-thumb .audio-player .play-meter .play-meter-active {
			position: relative;
			height: 8px;
			display: inline-block;
			border-radius: 5px;
			bottom: 9px; }
		.post-standard.audio .post-thumb .audio-player .play-meter .play-meter-active:after {
			content: '';
			display: block;
			width: 20px;
			height: 20px;
			border: 5px solid;
			border-color: inherit;
			border-radius: 100%;
			position: absolute;
			right: -17px;
			top: 50%;
			transform: translate(0, -50%);
			-webkit-transform: translate(0, -50%);
			-ms-transform: translate(0, -50%); }
		.post-standard.audio .post-thumb .audio-player .composition {
			display: inline-block; }
		.post-standard.audio .post-thumb .audio-player .composition .composition-title {
			color: #fff;
			line-height: 1; }
		.post-standard.audio .post-thumb .audio-player .composition .composition-subtitle {
			color: #6b7186;
			margin-bottom: 0; }
		.post-standard.audio .post-thumb .audio-player .like-share {
			float: right; }
		@media (max-width: 480px) {
			.post-standard.audio .post-thumb .audio-player .like-share {
				float: none; } }
		.post-standard.audio .post-thumb .audio-player .like-share a {
			margin-right: 20px; }
		.post-standard.audio .post-thumb .audio-player .like-share a:last-child {
			margin-right: 0; }
		.post-standard.audio .post-thumb .audio-player .like-share a i {
			font-size: 18px;
			color: #6b7186; }
		.post-standard.audio .post-thumb .audio-player .like-share a i.red {
			color: #f04e4e; }
		.post-standard.link .post-thumb {
			padding: 120px 100px;
			text-align: left; }
		@media (max-width: 1024px) {
			.post-standard.link .post-thumb {
				padding: 80px; } }
		@media (max-width: 570px) {
			.post-standard.link .post-thumb {
				padding: 30px; } }
		.post-standard.link .post-thumb .thumb-content {
			position: relative;
			z-index: 50; }
		.post-standard.link .post-thumb .thumb-content .thumb-content-title {
			color: #fff;
			margin-bottom: 30px;
			display: block; }
		.post-standard.link .post-thumb .thumb-content .site-link {
			color: #11847f;
			display: block; }
		.post-standard.link .post-thumb .thumb-content .post-link {
			display: block;
			position: absolute;
			right: 0;
			bottom: 0; }
		.post-standard.link .post-thumb .thumb-content .post-link i {
			font-size: 75px;
			color: #fff568; }
		@media (max-width: 360px) {
			.post {
				margin-bottom: 30px; } }

		.post .post__date {
			background-color: #f7f9f9;
			display: block;
			float: left; }

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
			color: #fff; }
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
	</style>
@endsection

@section('content')
	@include('front.pages.blog-slider')
	<section class="et_pb_top_inside_divider">

	</section>
	<div class="site-section bg-light">
		<div class="container">
			<div class="row">

				@foreach($posts as $post)
					<div class="col-md-4">
						<article class="hentry post post-standard has-post-thumbnail sticky">

							<div class="post-thumb">
								<img class="img-fluid" src="{{ $post->featured }}" alt="seo">
								<div class="overlay"></div>
								<a href="{{ $post->featured }}" class="link-image js-zoom-image">
									<i class="seoicon-zoom"></i>
								</a>
								<a href="#" class="link-post">
									<i class="seoicon-link-bold"></i>
								</a>
							</div>

							<div class="post__content">

								<div class="post__content-info">

									<h2 class="post__title entry-title text-center">
										<a href="{{ route('blog_single', ['slug' => $post->slug ]) }}">{{ $post->title }}</a>
									</h2>

									<div class="post-additional-info">

                                        <span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published" datetime="2016-04-17 12:00:00">
                                                {{ $post->created_at->toFormattedDateString() }}
                                            </time>

                                        </span>

										<span class="category">
                                            <i class="seoicon-tags"></i>
                                            <a href="{{ route('blog_category', ['id' => $post->category->id ]) }}">{{ $post->category->name }}</a>
                                        </span>
									</div>
								</div>
							</div>

						</article>
					</div>
					{{--<div class="col-lg-4 col-md-6 mb-4">
						<div class="post-entry-1 h-100">
							<a href="{{ route('blog_single', ['slug' => $post->slug ]) }}">
								<img src="{{ $post->featured }}" alt="Image"
									 class="img-fluid">
							</a>
							<div class="post-entry-1-contents">

								<h2><a href="{{ route('post.single', ['slug' => $post->slug ]) }}">{{$post->title}}</a>
								</h2>
								<span class="meta d-inline-block mb-3">{{$post->created_at->toFormattedDateString()}} <span
											class="mx-2">by</span> <a href="#">Admin</a></span>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores eos soluta, dolore
									harum molestias consectetur.</p>
							</div>
						</div>
					</div>--}}
				@endforeach

			</div>
		</div>
	</div>
	<section class="et_pb_bottom_inside_divider">

	</section>
@endsection

@section('js')
	<script type="text/javascript">
        $('#blog').addClass('active');
	</script>
@endsection