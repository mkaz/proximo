
.PHONY: watch
watch:
	node-sass -w --output-style compact -o ./ ./assets/style.scss

watch-editor:
	node-sass -w --output-style compact -o ./ ./assets/style-editor.scss

.PHONY: build
build:
	node-sass --output-style compact -o ./ ./assets/style.scss
	node-sass --output-style compact -o ./ ./assets/style-editor.scss

.PHONY: publish
publish: build
	echo "Building zip"
	rm -rf build/
	mkdir -p build/proximo
	cp *.php build/proximo/
	cp *.css build/proximo/
	cp readme.txt build/proximo/
	cp screenshot.png build/proximo/
	cp -r inc build/proximo/
	echo "Zip is dumb. Run this command."
	echo "cd build; zip -r proximo.zip proximo/"
