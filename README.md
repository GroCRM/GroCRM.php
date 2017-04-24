# GroCRM.php

The Gro CRM SDK allows you to easily connect to the Gro CRM REST API from PHP.

With the Gro CRM SDK you can manage your contacts, tasks, deals, inventory, and much more!

## Getting started

### Installation

The recommended way to install this framework is via [composer](https://getcomposer.org).

```no-highlight
composer require grocrm/grocrm
```

### Getting started

For additional information regarding parameters that are accepted by `fields`, response values that are returned from each method, and more please visit [Gro CRM Documentation](https://www.grocrm.com/developer/docs/).

#### Initialize the Client

```php
<?php

require "vendor/autoload.php";

use GroCRM\Client

$client = new Client("gro_crm_api_key");
```

#### Contact Methods

```php

// Return the contacts api class
$contacts = $client->contacts();

// Return contact types or a single type with id
$contactTypes = $contacts->types($id = null);

// Create a contact
$newContact = $contacts->create(array $fields);

// Return a list of contacts
$allContacts = $contacts->getAll($page = 1, $per_page = 20, $search = null, $sort = "date", $order = "desc");

// Return the contact with the specified id
$contact = $contacts->get($id);

// Return the contacts associated with the specified contact id
$associatedContacts = $contacts->getAssociatedContacts($id, $page = 1, $per_page = 20, $search = null, $sort = "date", $order = "desc");

// Return the deals associated with the specified contact id
$associatedDeals = $contacts->getAssociatedDeals($id, $page = 1, $per_page = 20, $search = null, $sort = "date", $order = "desc");

// Return the tasks associated with the specified contact id
$associatedTasks = $contacts->getAssociatedTasks($id, $page = 1, $per_page = 20, $search = null, $sort = "date", $order = "desc");

// Update the contact with the specified id
$updatedContact = $contacts->update($id, array $fields);

// Delete the contact with the specified id
$contacts->delete($id);
```

#### Deal Methods

```php

// Return the deals api class
$deals = $client->deals();

// Return deal sources or a single source with id
$dealSources = $deals->sources($id = null);

// Return deal stages or a single stage with id
$dealStages = $deals->stages($id = null);

// Return deal scores or a single score with id
$dealScores = $deals->scores($id = null);

// Create a deal
$newDeal = $deals->create(array $fields);

// Return a list of deals
$allDeals = $deals->getAll($page = 1, $per_page = 20, $search = null, $sort = "date", $order = "desc");

// Return the deal with the specified id
$deal = $deals->get($id);

// Update the deal with the specified id
$updatedDeal = $deals->update($id, array $fields);

// Delete the deal with the specificed id
$deals->delete($id) 

```

#### Task Methods

```php

// Return the tasks api class
$tasks = $client->tasks();

// Return task statuses or a single status with id
$taskStatuses = $tasks->statuses($id = null);

// Return task priorities or a single priority with id
$taskPriorities = $tasks->priorities($id = null);

// Return task scores or a single scores with id
$taskScores = $tasks->scores($id = null);

// Create a task
$newTask = $tasks->create(array $fields);

// Return a list of tasks
$allTasks = $tasks->getAll($page = 1, $per_page = 20, $search = "", $sort = "date", $order = "desc")

// Return the task with the specified id
$task = $tasks->get($id)

// Update the task with the specified id
$updatedTask = $tasks->update($id, array $fields)

// Delete the task with the specified id
$tasks->delete($id)

```

#### Inventory Methods

```php

// Return the inventory api class
$inventory = $client->inventory();

// Return inventory types or a single type with id
$inventoryTypes = $inventory->types($id = null);

// Create a new inventory item
$newInventoryItem = $inventory->create(array $fields);

// Return a list of inventory items
$allInventory = $inventory->getAll($page = 1, $per_page = 20, $search = "", $sort = "date", $order = "desc");

// Return the inventory item with the specified id
$inventoryItem = $inventory->get($id);

// Update the inventory item with the specified id
$updatedInventoryItem = $inventory->update($id, array $fields);

// Delete the inventory item with the specified id
$inventory->delete($id);
```

#### Company Methods

```php

// Return the company api class
$company = $client->company();

// Return your companies information
$companyInfo = $company->get();

// Update your companies information
$updatedCompanyInfo = $company->update(array $fields);

```


#### User Methods

```php

// Return the user api class
$users = $client->users();

// Return user roles or a single role with id
$userRoles = $users->roles($id = null);

// Return a list of users
$allUsers = $users->getAll($page = 1, $per_page = 20, $search = "", $sort = "date", $order = "desc");

// Return a user with the specified id
$user = $users->get($id);

// Return the currently authenticated user
$authenticatedUser = $users->getAuthenticated();

```

#### Global Methods

```php

// Return countries or a single country with id
$countries = $client->getCountries($id = null);

// Return timezones or a single timezone with id
$timezones = $client->getTimeszones($id = null);

// Return currenciesor a single currency with id
$currencies = $client->getCurrencies($id = null);

```

#### Pagination

Any of the methods that return multiple items can use the pager class to paginate through multiple pages of data.

```php

$contactsPage1 = $client->contacts()->getAll();
$pager = new GroCRM\API\Pager($client, $contacts);

if ($pager->hasNext()) {
    $contactsPage2 = $pager->getNext();
}

```

#### Exceptions

The Gro CRM SDK uses Guzzle for all network requests, if you attempt a request and the request fails a Guzzle exception will be thrown. For more information about Guzzle exceptions please see the [Guzzle Docs](http://docs.guzzlephp.org/en/latest/quickstart.html#exceptions)

##### Example

```php

try {
    $contacts = $client->contacts()->getAll();
    var_dump($contacts);
    
} catch (GuzzleHttp\Exception\ClientException $e) {
    $response = $e->getResponse();
    $statusCode = $response->getStatusCode();
    $body = $response->getBody()->getContents();
    $errors = json_decode($body, true);
    var_dump($errors);
}

```

### Need Help? No Problem!

If you need help please contact us at [opensource@grocrm.com](mailto:opensource@grocrm.com?Subject=Gro%20CRM%20PHP%20SDK%20Help) or ask a question on [StackOverflow](http://stackoverflow.com/questions/tagged/grocrm) (Tag 'grocrm')

Found a bug? Please open an [issue](https://github.com/GroCRM/GroCRM.php/issues)

