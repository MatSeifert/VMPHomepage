#!/bin/bash

# gen_minecraft_map -- Generating the minecraft map
#
# Copyright (c) Robert Lehmann <lehmrob@gmail.com>
#
# This script invokes mapcraft to generate the minecraft map.

usage() {
	echo -e "$0 [OPTIONS] <RENDER.CONF>\n"
}

while getopts "h" option; do
	case $option in
		h)
			usage
			exit 0
			;;
	esac
done
