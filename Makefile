
.PHONY: watch
watch:
	node-sass -w --output-style compact -o ./ ./assets/style.scss

.PHONY: build
build:
	node-sass --output-style compact -o ./ ./assets/style.scss

.PHONY: publish
publish: build
	echo "Building zip"
	rm -rf build/
	mkdir -p build/proximo
	cp *.php build/proximo/
	cp *.css build/proximo/
	cp screenshot.png build/proximo/
	cp -r inc build/proximo/
	