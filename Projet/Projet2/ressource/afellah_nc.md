# Ex1
	>> nc -l 2024
	>> nc localhost 2024

# Ex2
	HTTP/1.1 200 OK
	Server: nginx
	Date: Tue, 17 Dec 2024 11:39:15 GMT
	Content-Type: text/plain
	Content-Length: 41
	Last-Modified: Mon, 16 Dec 2024 19:37:26 GMT
	Connection: keep-alive
	ETag: "67608176-29"
	X-Frame-Options: DENY
	Referrer-Policy: strict-origin
	X-Content-Type-Options: nosniff
	Content-Security-Policy: base-uri 'none'; connect-src 'self' 'unsafe-inline' 'wasm-unsafe-eval' clic.ppom.me; default-src 'self' u.ppom.me static.ppom.me; form-action 'none'; frame-ancestors 'none'; img-src 'self'; script-src 'self' 'unsafe-inline' 'wasm-unsafe-eval' clic.ppom.me; style-src 'self' 'unsafe-inline';
	Accept-Ranges: bytes

	Ceci est le contenu du fichier /test.txt
# Ex3
Min pc : nc -l 4444
Son pc : nc 192.168.0.182