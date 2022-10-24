
help: ## Display available commands
	@fgrep -h "##" $(MAKEFILE_LIST) | fgrep -v fgrep | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'


# =====================================================================
# Application =========================================================
# =====================================================================


start:  ## Start server symfony
	symfony server:start -d

stop:  ## Stop server symfony
	symfony server:stop

build-assets: ## Build scss to css and copy to public dir
	yarn encore production

logs:  ## Display logs of symfony server
	symfony server:logs

run-tests:  ## Run tests
	php bin/phpunit tests/


# =====================================================================
# Other  ==============================================================
# =====================================================================


default: help
