#!/bin/bash

# vmp_deploy -- Script for homepage deployment
#
# Copyright (c) 2015 Robert Lehmann <lehmrob@gmail.com>
#
# This software may be modified and distributed under the terms
# of the MIT license. See LICENSE file for details.

# PROD_ROOT=/var/www
PROD_ROOT=/tmp/www
NIGHTLY_ROOT=$PROD_ROOT/nightly
FORUM_BACK_wbb=/tmp/wbb
FORUM_BACK_wcf=/tmp/wcf
PAGE_REPO=git://github.com/MatSeifert/VMPHomepage.git

cur_dir=$(pwd)

show_help() {
	echo "$0 [OPTIONS]"
	echo -e "\tOPTIONS:"
	echo -e "\t\t-h\tShow help text"
	echo -e "\t\t-n\tDo nightly build"
	echo -e "\t\t-p TAG\tDo production build of given tag"
}

run_composer() {
	if [ -d $1 ]; then
		cd $1
		composer install
	fi
}

nightly() {
	# Backup the forum
	if [ -d $NIGHTLY_ROOT/wbb ]; then
		cp -rp $NIGHTLY_ROOT/wbb $FORUM_BACK_wbb
	fi
	if [ -d $NIGHTLY_ROOT/wcf ]; then
		cp -rp $NIGHTLY_ROOT/wcf $FORUM_BACK_wcf
	fi

	rm -rf $NIGHTLY_ROOT

	# Clone the current Master to nightly root
	git clone $PAGE_REPO $NIGHTLY_ROOT
}

production

if [ $# -lt 1 ]
then
	show_help
	exit 1
fi

while getopts 'nph' opt
do
	case $opt in
		n)
			nightly
			;;
		p)
			production
			;;
		h)
			show_help
			;;
		*)
			show_help
			exit 1
			;;
	esac
done
