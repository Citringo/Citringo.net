#!/bin/sh

if [ $# -ne 5 ]; then
	echo "Usage: $0 <major> <minor> <revision> <suffix> <description>"
	exit 
fi

cat << EOS >> "${1}.${2}.${3}-${4}.json"
{
	"Major": $1,
	"Minor": $2,
	"Revision": $3,
	"Suffix": "$4",
	"Description": "$5"
}
EOS

exit 0
