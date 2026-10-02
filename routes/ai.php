<?php

use App\Mcp\Servers\CompubaseServer;
use Laravel\Mcp\Facades\Mcp;

// OAuth discovery and client registration, so Claude can connect and ask for access.
Mcp::oauthRoutes();

// The website's MCP server: https://{domain}/mcp. Needs an OAuth token from an admin.
Mcp::web('/mcp', CompubaseServer::class)->middleware(['auth:api', 'throttle:120,1']);
