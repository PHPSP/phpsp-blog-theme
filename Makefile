##############################################################################
#                  __
#           ____  / /_	____  ____ ____ 
#          / __ \/ __ \/ __ \/ ___/ __ \
#         / /_/ / / / / /_/ (__  ) /_/ /
#        / .___/_/ /_/ .___/____/ .___/
#       /_/         /_/        /_/      
#
##############################################################################

PLUGINDIR = ../../plugins
THEMEDIR  = ../themes/phpsp-blog-theme	

all:
	cd $(PLUGINDIR) && echo "Go to plugins directory" && \
	# wp-no-category-base
	curl -O http://downloads.wordpress.org/plugin/wp-no-category-base.zip
	unzip wp-no-category-base.zip
	# disqus-comment-system
	curl -O http://downloads.wordpress.org/plugin/disqus-comment-system.2.77.zip
	unzip disqus-comment-system.2.77.zip
	# crayon-syntax-highlighter
	curl -O http://downloads.wordpress.org/plugin/crayon-syntax-highlighter.zip
	unzip crayon-syntax-highlighter.zip
	# event-organiser
	curl -O http://downloads.wordpress.org/plugin/event-organiser.latest-stable.zip
	unzip event-organiser.latest-stable.zip
	# link-manager
	curl -O http://downloads.wordpress.org/plugin/link-manager.zip
	unzip link-manager.zip
	cd $(THEMEDIR) && echo "Go to theme directory" && \
