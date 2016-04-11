docker build -it bensisko/cheston .
docker run --rm -it -v $PWD:/app -p 81:80 bensisko/cheston
